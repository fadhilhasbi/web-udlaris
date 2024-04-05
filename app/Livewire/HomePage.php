<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Homepage - UD Laris')]
class HomePage extends Component
{
    public function render()
    {
        $categories = Category::where('is_active', 1)->get();
        $products = Product::where('is_featured',1)->get();
        return view('livewire.home-page', [
            'categories' => $categories,
            'products'=> $products,
        ]);
    }
}
