<?php

namespace App\Filament\Resources\EventWaitinglists\Pages;

use App\Filament\Resources\EventWaitinglists\EventWaitinglistResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEventWaitinglists extends ListRecords
{
    protected static string $resource = EventWaitinglistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
