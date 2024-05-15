<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Address;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use Midtrans\Config;
use Midtrans\Snap;

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

        $address = new Address();
        $address->first_name = $this->first_name;
        $address->last_name = $this->last_name;
        $address->phone = $this->phone;
        $address->street_address = $this->street_address;
        $address->city = $this->city;
        $address->state = $this->state;
        $address->zip_code = $this->zip_code;

        // $redirect_url = '';
        $success_url = route('success');
        $cancel_url = route('cancel');

        if ($this->payment_method == 'midtrans') {
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$clientKey = config('services.midtrans.clientKey');
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $transaction_details = [
                'order_id' => rand(),
                'gross_amount' => $order->grand_total, // no decimal allowed for creditcard
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
                    'success' => $success_url,
                    'failure' => $cancel_url,
                    'pending' => $cancel_url,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            $redirect_url = Snap::getSnapUrl($params);
            // dd([$snapToken, $snapToken->$redirect_url]);
        } else {
            $redirect_url = $success_url;
        }

        // if ($this->payment_method == 'midtrans') {
        //     Stripe::setApiKey(env('STRIPE_SECRET'));
        //     $sessionCheckout = Session::create([
        //         'payment_method_types' => ['card'],
        //         'customer_email' => auth()->user()->email,
        //         'line_items' => $line_items,
        //         'mode' => 'payment',
        //         'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
        //         'cancel_url' => route('cancel'),
        //     ]);

        //     $redirect_url = $sessionCheckout->url;
        // } else {
        //     $redirect_url = route('success');
        // }

        $order->save();
        $address->order_id = $order->id;
        $address->save();
        $order->items()->createMany($cart_items);
        CartManagement::clearCartItems();
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
