<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Product;

#[Title('Keranjang Pesanan - UD Laris')]
class CartPage extends Component
{
    public $cart_items = [];
    public $grand_total;

    public function mount()
    {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function removeItem($product_id)
    {
        $this->cart_items = CartManagement::removeCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }

    public function increaseQty($product_id)
    {
        $this->cart_items = CartManagement::incrementQuantityToCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function decreaseQty($product_id)
    {
        $this->cart_items = CartManagement::decrementQuantityToCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }
    public function checkout()
    {
        foreach ($this->cart_items as $item) {
            $product = Product::find($item['id']); // Fetch the product

            if ($product) {
                // Check if there is enough stock
                if ($product->quantity >= $item['quantity']) {
                    // Reduce the stock
                    $product->quantity -= $item['quantity'];
                    $product->save(); // Save the changes
                } else {
                    // Handle the case where there isn't enough stock
                    session()->flash('error', 'Not enough stock for ' . $product->name);
                    return;
                }
            }
        }


        session()->flash('success', 'Checkout successful!');
        $this->mount(); // Refresh cart items
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
