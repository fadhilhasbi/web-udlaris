<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\X3dTable;
use Livewire\Attributes\Title;

class CustomCreateTablePage extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    #[Title('Kustomisasi Tipe Meja - UD Laris')]
    public function render()
    {
        $x3d_table = X3dTable::where('slug', $this->slug)->where('is_active',1)->firstOrFail();
        // dd($x3d_tables->papan_filepath);
        return view('livewire.custom-create-table-page', [
            'x3d_table'=> $x3d_table,
        ]);
    }
}