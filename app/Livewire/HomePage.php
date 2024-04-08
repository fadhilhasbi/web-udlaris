<?php

namespace App\Livewire;

use App\Models\Slide;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;

#[Title('Homepage - UD Laris')]
class HomePage extends Component
{
    public function render()
    {
        $categories = Category::where('is_active', 1)->get();
        $slides = Slide::where('is_active', 1)->get();
        $products = Product::where('is_featured',1)->get();
        return view('livewire.home-page', [
            'categories' => $categories,
            'products'=> $products,
            'slides'=> $slides
        ]);
    }
}
