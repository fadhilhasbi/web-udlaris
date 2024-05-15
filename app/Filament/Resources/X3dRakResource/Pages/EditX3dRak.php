<?php

namespace App\Filament\Resources\X3dRakResource\Pages;

use App\Filament\Resources\X3dRakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditX3dRak extends EditRecord
{
    protected static string $resource = X3dRakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
