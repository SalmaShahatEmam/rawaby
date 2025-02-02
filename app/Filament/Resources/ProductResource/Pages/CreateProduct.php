<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
    protected function afterCreate(): void
    {

        $product = $this->record;

        $uploadedImages = $this->form->getState()['images'];

        foreach ($uploadedImages as $image) {
            $product->images()->create([
                'path' => $image,
            ]);
        }
    }


}
