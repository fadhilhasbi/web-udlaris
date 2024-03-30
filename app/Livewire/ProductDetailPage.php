<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

class ProductDetailPage extends Component
{
    #[Title('Produk Detail - UD Laris')]
    public function render()
    {
        $products = Product::all();
        return view('livewire.product-detail-page', [
            'products'=> $products,
        ]);
    }
}
