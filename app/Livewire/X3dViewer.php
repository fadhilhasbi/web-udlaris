<?php

namespace App\Livewire;

use App\Models\X3dTable;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class X3dViewer extends Component
{
    #[Title('X3D Viewer - UD Laris')]
    #[Layout('components.layouts.xthreed')]
    public function render()
    {
        $x3d_tables = X3dTable::where('is_active',1)->get();
        return view('livewire.x3d-viewer', [
            'x3d_tables'=> $x3d_tables,
        ]);
    }
}
