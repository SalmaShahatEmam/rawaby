<?php

namespace App\Filament\Resources\LiberaryResource\Pages;

use App\Filament\Resources\LiberaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLiberary extends EditRecord
{
    protected static string $resource = LiberaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
