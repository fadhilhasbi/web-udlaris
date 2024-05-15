<?php

namespace App\Livewire;

use App\Models\X3dChair;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomCreateChairPage extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    #[Title('Kustomisasi Tipe Kursi - UD Laris')]
    public function render()
    {
        $x3d_chair = X3dChair::where('slug', $this->slug)->where('is_active',1)->firstOrFail();
        // dd($x3d_tables->papan_filepath);
        return view('livewire.custom-create-chair-page', [
            'x3d_chair'=> $x3d_chair,
        ]);
    }
}