<?php

namespace App\Filament\Resources\EventWaitinglists\Pages;

use App\Filament\Resources\EventWaitinglists\EventWaitinglistResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEventWaitinglist extends ViewRecord
{
    protected static string $resource = EventWaitinglistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
