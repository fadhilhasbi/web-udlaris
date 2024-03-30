<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;

class ProductsPage extends Component
{
    #[Title('Products - UD Laris')]
    public function render()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('livewire.products-page', [
            'categories'=> $categories,
            'products'=> $products,
        ]);
    }
}
