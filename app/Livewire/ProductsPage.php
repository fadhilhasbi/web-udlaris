<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Products - UD Laris')]
class ProductsPage extends Component
{
    use WithPagination;
    use LivewireAlert;

    #[Url]
    public $selected_categories = [];

    #[Url]
    public $featured;

    #[Url]
    public $on_sale;

    #[Url]
    public $price_range = 300000;

    #[Url]
    public $sort = 'latest';
//     public function preOrder($product_id)
// {
//     // Logic for handling the pre-order process
//     // For example, you can add the product to the cart in a pre-order state or create a pending order
//     $total_count = CartManagement::addItemToCart($product_id, 'Pre-order');  // If you need to distinguish between normal and pre-order

//     // Optionally, send a success alert
//     $this->alert('success', 'Produk berhasil diproses untuk Pre-order!', [
//         'position' => 'bottom-end',
//         'timer' => 3000,
//         'toast' => true,
//         'timerProgressBar' => false,
//     ]);

//     // Optionally, you can dispatch an event to update the cart count in a navbar or anywhere else
//     $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
// }
    // add product to cart
    public function addToCart ($product_id) {
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Produk berhasil ditambahkan ke keranjang!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => false,
           ]);
    }

    public function render()
    {
        $productQuery = Product::query()
        ->where('is_active', 1);


        if (!empty($this->selected_categories)) {
            $productQuery->whereHas('categories', function ($query) {
                $query->whereIn('id', $this->selected_categories);
            });
        }

        if ($this->featured) {
            $productQuery->where('is_featured', 1);
        }

        if ($this->on_sale) {
            $productQuery->where('on_sale', 1);
        }

        if ($this->price_range) {
            $productQuery->whereBetween('price', [0, $this->price_range]);
        }

        if ($this->sort == 'latest') {
            $productQuery->latest();
        }

        if ($this->sort == 'price') {
            $productQuery->orderBy('price');
        }

        return view('livewire.products-page', [
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
            'products' => $productQuery->paginate(6),
        ]);
    }
}
