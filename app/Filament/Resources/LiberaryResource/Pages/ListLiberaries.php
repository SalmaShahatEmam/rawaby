<?php

namespace App\Filament\Resources\LiberaryResource\Pages;

use App\Filament\Resources\LiberaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLiberaries extends ListRecords
{
    protected static string $resource = LiberaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
