<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\X3dRak;
use Livewire\Attributes\Title;

class CustomCreateRakPage extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    #[Title('Kustomisasi Tipe Rak - UD Laris')]
    public function render()
    {
        $x3d_rak = X3dRak::where('slug', $this->slug)->where('is_active',1)->firstOrFail();
        return view('livewire.custom-create-rak-page', [
            'x3d_rak'=> $x3d_rak,
        ]);
    }
}