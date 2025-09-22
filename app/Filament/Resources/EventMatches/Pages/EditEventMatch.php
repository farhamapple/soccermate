<?php

namespace App\Filament\Resources\EventMatches\Pages;

use App\Filament\Resources\EventMatches\EventMatchResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEventMatch extends EditRecord
{
    protected static string $resource = EventMatchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
