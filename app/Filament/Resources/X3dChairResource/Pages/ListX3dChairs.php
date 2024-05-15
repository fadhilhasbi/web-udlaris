<?php

namespace App\Filament\Resources\X3dChairResource\Pages;

use App\Filament\Resources\X3dChairResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListX3dChairs extends ListRecords
{
    protected static string $resource = X3dChairResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
