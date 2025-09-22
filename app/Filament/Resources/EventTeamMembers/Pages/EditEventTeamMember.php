<?php

namespace App\Filament\Resources\EventTeamMembers\Pages;

use App\Filament\Resources\EventTeamMembers\EventTeamMemberResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEventTeamMember extends EditRecord
{
    protected static string $resource = EventTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
