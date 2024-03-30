<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;

class CategoriesPage extends Component
{
    #[Title('Categories - UD Laris')]
    public function render()
    {
        $categories = Category::all();
        return view('livewire.categories-page', [
            'categories'=> $categories,
        ]);
    }
}
