<?php

namespace App\Filament\Resources\X3dCabinetResource\Pages;

use App\Filament\Resources\X3dCabinetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditX3dCabinet extends EditRecord
{
    protected static string $resource = X3dCabinetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
