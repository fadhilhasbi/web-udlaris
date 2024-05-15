<?php

namespace App\Filament\Resources\X3dChairResource\Pages;

use App\Filament\Resources\X3dChairResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditX3dChair extends EditRecord
{
    protected static string $resource = X3dChairResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
