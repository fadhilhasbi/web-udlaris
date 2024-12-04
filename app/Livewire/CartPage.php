<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Keranjang Pesanan - UD Laris')]
class CartPage extends Component
{
    public $cart_items = [];
    public $custom_products = [];
    public $grand_total;

    public function mount()
    {
        // Fetch regular products from the cookie
        $this->cart_items = CartManagement::getCartItemsFromCookie();

        // Fetch custom products from cookies
        $this->custom_products = json_decode($_COOKIE['custom_products'] ?? '[]', true);

        // Calculate the grand total by including both regular and custom products
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items) + $this->calculateCustomProductsTotal();
    }

    public function removeItem($product_id)
    {
        // Remove the regular product
        $this->cart_items = CartManagement::removeCartItem($product_id);

        // Recalculate the grand total
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items) + $this->calculateCustomProductsTotal();

        // Update cart count in Navbar component
        $this->dispatch('update-cart-count', total_count: count($this->cart_items))->to(Navbar::class);
    }

    public function removeCustomProduct($index)
    {
        // Remove custom product based on index
        $customProducts = json_decode($_COOKIE['custom_products'] ?? '[]', true);
        unset($customProducts[$index]);

        // Update cookie with the new custom products list
        setcookie('custom_products', json_encode(array_values($customProducts)), time() + 3600 * 24 * 7, "/");

        // Emit event to update cart view
        $this->emit('cartUpdated');

        // Update the custom products and grand total
        $this->custom_products = array_values($customProducts);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items) + $this->calculateCustomProductsTotal();
    }

    public function increaseQty($product_id)
    {
        $this->cart_items = CartManagement::incrementQuantityToCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items) + $this->calculateCustomProductsTotal();
    }

    public function decreaseQty($product_id)
    {
        $this->cart_items = CartManagement::decrementQuantityToCartItem($product_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items) + $this->calculateCustomProductsTotal();
    }

    // Calculate the total price for custom products
    public function calculateCustomProductsTotal()
    {
        return array_sum(array_column($this->custom_products, 'price'));
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
