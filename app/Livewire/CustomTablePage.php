<?php

namespace App\Livewire;

use App\Models\X3dTable;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomTablePage extends Component
{
    #[Title('Kustomisasi Meja - UD Laris')]
    public function render()
    {
        $x3d_tables = X3dTable::all();
        return view('livewire.custom-table-page', [
            'x3d_tables'=> $x3d_tables,
        ]);
    }
}