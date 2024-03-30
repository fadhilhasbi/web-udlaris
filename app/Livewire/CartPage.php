<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class CartPage extends Component
{
    #[Title('Keranjang Pesanan - UD Laris')]
    public function render()
    {
        return view('livewire.cart-page');
    }
}
