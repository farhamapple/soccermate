<?php

namespace App\Filament\Resources\EventTeamMembers\Pages;

use App\Filament\Resources\EventTeamMembers\EventTeamMemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEventTeamMember extends CreateRecord
{
    protected static string $resource = EventTeamMemberResource::class;
}
