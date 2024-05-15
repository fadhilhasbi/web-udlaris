<?php

namespace App\Filament\Resources\X3dCabinetResource\Pages;

use App\Filament\Resources\X3dCabinetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListX3dCabinets extends ListRecords
{
    protected static string $resource = X3dCabinetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
