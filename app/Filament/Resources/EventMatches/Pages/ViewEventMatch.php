<?php

namespace App\Filament\Resources\EventMatches\Pages;

use App\Filament\Resources\EventMatches\EventMatchResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEventMatch extends ViewRecord
{
    protected static string $resource = EventMatchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
