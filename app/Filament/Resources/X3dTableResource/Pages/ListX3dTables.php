<?php

namespace App\Filament\Resources\X3dTableResource\Pages;

use App\Filament\Resources\X3dTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListX3dTables extends ListRecords
{
    protected static string $resource = X3dTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
