<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            // Actions\DeleteAction::make(),
=======
            //Actions\DeleteAction::make(),
>>>>>>> da9954f (feat(transaction): add stock check and invoice order)
        ];
    }
}
