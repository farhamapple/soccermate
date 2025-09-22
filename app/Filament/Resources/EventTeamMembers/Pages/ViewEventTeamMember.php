<?php

namespace App\Filament\Resources\EventTeamMembers\Pages;

use App\Filament\Resources\EventTeamMembers\EventTeamMemberResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEventTeamMember extends ViewRecord
{
    protected static string $resource = EventTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
