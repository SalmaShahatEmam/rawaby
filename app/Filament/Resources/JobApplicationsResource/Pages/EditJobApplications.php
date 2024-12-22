<?php

namespace App\Filament\Resources\JobApplicationsResource\Pages;

use App\Filament\Resources\JobApplicationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobApplications extends EditRecord
{
    protected static string $resource = JobApplicationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
