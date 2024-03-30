<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\X3dTable;
use Livewire\Attributes\Title;

class CustomTableMejaPanjang extends Component
{
    #[Title('Kustomisasi Tipe Meja Panjang - UD Laris')]
    public function render()
    {
        $x3d_tables = X3dTable::where('is_active',1)->get();
        return view('livewire.custom-table-meja-panjang', [
            'x3d_tables'=> $x3d_tables,
        ]);
    }
}
