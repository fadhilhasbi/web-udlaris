<?php

namespace App\Livewire;

use App\Models\X3dRak;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomRakPage extends Component
{
    #[Title('Kustomisasi Rak - UD Laris')]
    public function render()
    {
        $x3d_raks = X3dRak::all();
        return view('livewire.custom-rak-page', [
            'x3d_raks'=> $x3d_raks,
        ]);
    }
}
