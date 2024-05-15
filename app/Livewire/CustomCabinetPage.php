<?php

namespace App\Livewire;

use App\Models\X3dCabinet;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomCabinetPage extends Component
{
    #[Title('Kustomisasi Lemari - UD Laris')]
    public function render()
    {
        $x3d_cabinets = X3dCabinet::all();
        return view('livewire.custom-cabinet-page', [
            'x3d_cabinets'=> $x3d_cabinets,
        ]);
    }
}
