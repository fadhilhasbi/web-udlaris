<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Produk Detail - UD Laris')]
class ProductDetailPage extends Component
{
    public $slug;

    public function mount ($slug) {
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.product-detail-page', [
            'product'=> Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
