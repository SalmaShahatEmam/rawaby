<?php

namespace App\Filament\Resources\ServiceRequestResource\Pages;

use App\Filament\Resources\ServiceRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class SendReply extends EditRecord
{
    protected static string $resource = ServiceRequestResource::class;
}
