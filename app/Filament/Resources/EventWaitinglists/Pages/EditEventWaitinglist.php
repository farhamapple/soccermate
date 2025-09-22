<?php

namespace App\Filament\Resources\EventWaitinglists\Pages;

use App\Filament\Resources\EventWaitinglists\EventWaitinglistResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEventWaitinglist extends EditRecord
{
    protected static string $resource = EventWaitinglistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
