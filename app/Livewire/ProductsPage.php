<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Products - UD Laris')]
class ProductsPage extends Component
{
    use WithPagination;

    #[Url]
    public $selected_categories = [];

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

        if (!empty($this->selected_categories)) {
            $productQuery->whereHas('categories', function ($query) {
                $query->whereIn('id', $this->selected_categories);
            });
        }

        return view('livewire.products-page', [
            'categories'=> Category::where('is_active', 1)->get(['id', 'name', 'slug']),
            'products'=> $productQuery->paginate(6),
        ]);
    }
}
