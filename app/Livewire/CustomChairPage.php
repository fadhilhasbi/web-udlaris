<?php

namespace App\Livewire;

use App\Models\X3dChair;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomChairPage extends Component
{
    #[Title('Kustomisasi Kursi - UD Laris')]
    public function render()
    {
        $x3d_chairs = X3dChair::all();
        return view('livewire.custom-chair-page', [
            'x3d_chairs'=> $x3d_chairs,
        ]);
    }
}
