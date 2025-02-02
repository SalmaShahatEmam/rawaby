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
            Actions\DeleteAction::make(),
        ];
    }


    protected function afterSave(): void
    {
        $product = $this->record;
        if ($product->images) {

            $product->images()->delete();
        }

        $uploadedImages = $this->form->getState()['images'];

        foreach ($uploadedImages as $image) {
            $product->images()->create([
                'path' => $image,
            ]);
        }
    }


}
