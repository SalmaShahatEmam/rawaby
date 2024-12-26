<?php

namespace App\Filament\Resources\TargetSectorResource\Pages;

use App\Filament\Resources\TargetSectorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTargetSectors extends ListRecords
{
    protected static string $resource = TargetSectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
