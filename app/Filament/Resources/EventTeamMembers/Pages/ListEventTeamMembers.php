<?php

namespace App\Filament\Resources\EventTeamMembers\Pages;

use App\Filament\Resources\EventTeamMembers\EventTeamMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEventTeamMembers extends ListRecords
{
    protected static string $resource = EventTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
