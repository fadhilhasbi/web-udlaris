<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductCustomPage extends Component
{
    #[Title('Kustomisasi Produk | Pilih Kategori - UD Laris')]

    public function render()
    {
        $categories = Category::all();
        return view('livewire.product-custom-page', [
            'categories'=> $categories,
        ]);
    }
}
