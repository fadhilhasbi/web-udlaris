<?php

namespace App\Livewire;

use App\Models\X3dCabinet;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomCreateCabinetPage extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    #[Title('Kustomisasi Tipe Lemari - UD Laris')]
    public function render()
    {
        $x3d_cabinet = X3dCabinet::where('slug', $this->slug)->where('is_active',1)->firstOrFail();
        return view('livewire.custom-create-cabinet-page', [
            'x3d_cabinet'=> $x3d_cabinet,
        ]);
    }
}