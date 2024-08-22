<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Address;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use Midtrans\Config;
use Midtrans\Snap;
use Redirect;

#[Title('Checkout Keranjang - UD Laris')]
class CheckoutPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone;
    public $street_address;
    public $city;
    public $state;
    public $zip_code;
    public $payment_method;

    // public function mount() {
    //     $cart_items = CartManagement::getCartItemsFromCookie();
    //     if(count($cart_items) == 0) {
    //         return redirect('/product');
    //     }
    // }

    public function placeOrder()
    {
        // Validate the form data
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'payment_method' => 'required',
        ]);

        $cart_items = CartManagement::getCartItemsFromCookie();
        $line_items = [];

        foreach ($cart_items as $item) {
            $line_items[] = [
                'id' => $item['product_id'],
                'price' => $item['unit_amount'],
                'quantity' => $item['quantity'],
                'name' => $item['name'],
            ];
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->grand_total = CartManagement::calculateGrandTotal($cart_items);
        $order->payment_method = $this->payment_method;
        $order->payment_status = 'pending';
        $order->status = 'new';
        $order->currency = 'idr';
        $order->shipping_amount = 0;
        $order->shipping_method = 'none';
        $order->notes = 'Pesanan dilakukan oleh ' . auth()->user()->name;
        $order->save();

        $address = new Address();
        $address->first_name = $this->first_name;
        $address->last_name = $this->last_name;
        $address->phone = $this->phone;
        $address->street_address = $this->street_address;
        $address->city = $this->city;
        $address->state = $this->state;
        $address->zip_code = $this->zip_code;
        $address->order_id = $order->id;
        $address->save();

        $order->items()->createMany($cart_items);
        CartManagement::clearCartItems();

        $success_url = route('success', ['order_id' => $order->id]);
        $cancel_url = route('cancel', ['order_id' => $order->id]);

        if ($this->payment_method === 'midtrans') {
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$clientKey = config('services.midtrans.clientKey');
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $transaction_details = [
                'order_id' => 'MID' . $order->id . uniqid(), // This should ideally be something unique
                'gross_amount' => $order->grand_total, // no decimal allowed for credit card
            ];

            $customer_details = [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => auth()->user()->email,
                'phone' => $this->phone,
                'shipping_address' => [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'phone' => $this->phone,
                    'address' => $this->street_address,
                    'city' => $this->city,
                    'postal_code' => $this->zip_code,
                    'country_code' => 'IDN',
                ],
            ];

            $params = [
                'transaction_details' => $transaction_details,
                'item_details' => $line_items,
                'customer_details' => $customer_details,
                'callbacks' => [
                    'finish' => $success_url, // Redirect to success page after payment
                    'expire' => $cancel_url
                ],
                'expiry' => [
                    'duration' => 20,
                    'unit' => 'seconds'
                ]
            ];

            Config::$overrideNotifUrl = route('midtrans.notification');

            $snapToken = Snap::getSnapToken($params);
            $redirect_url = Snap::getSnapUrl($params); // Correct method to generate the redirect URL
        } else {
            // Handle Cash on Delivery (COD)
            $redirect_url = $success_url;
        }

        return redirect($redirect_url);
    }



    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);
        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total
        ]);
    }
}
