<?php

namespace App\Filament\Resources\X3dRakResource\Pages;

use App\Filament\Resources\X3dRakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListX3dRaks extends ListRecords
{
    protected static string $resource = X3dRakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
