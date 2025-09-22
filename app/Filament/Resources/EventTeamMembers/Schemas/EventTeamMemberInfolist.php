<?php

namespace App\Filament\Resources\EventTeamMembers\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EventTeamMemberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('event_id')
                    ->numeric(),
                TextEntry::make('community_member_id')
                    ->numeric(),
                TextEntry::make('event_team_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('name')
                    ->placeholder('-'),
                TextEntry::make('goals_scored')
                    ->numeric(),
                TextEntry::make('cards')
                    ->numeric(),
                TextEntry::make('matches_without_goal')
                    ->numeric(),
                IconEntry::make('is_present')
                    ->boolean(),
                TextEntry::make('team_count')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('position')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
