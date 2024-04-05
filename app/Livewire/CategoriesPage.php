<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;

#[Title('Categories - UD Laris')]
class CategoriesPage extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.categories-page', [
            'categories'=> $categories,
        ]);
    }
}
