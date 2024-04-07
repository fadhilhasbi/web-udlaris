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

    #[Url]
    public $featured;

    #[Url]
    public $on_sale;

    #[Url]
    public $price_range = 300000;

    #[Url]
    public $sort = 'latest';

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

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
