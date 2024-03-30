<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class CustomCabinetPage extends Component
{
    #[Title('Kustomisasi Produk | Pilih Tipe - UD Laris')]

    public function render()
    {
        return view('livewire.custom-cabinet-page');
    }
}
