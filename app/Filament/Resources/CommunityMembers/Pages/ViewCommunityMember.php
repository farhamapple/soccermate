<?php

namespace App\Filament\Resources\CommunityMembers\Pages;

use App\Filament\Resources\CommunityMembers\CommunityMemberResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCommunityMember extends ViewRecord
{
    protected static string $resource = CommunityMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
