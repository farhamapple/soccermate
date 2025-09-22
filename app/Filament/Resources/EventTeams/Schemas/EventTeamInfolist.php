<?php

namespace App\Filament\Resources\EventTeams\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EventTeamInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('event_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('win')
                    ->numeric(),
                TextEntry::make('draw')
                    ->numeric(),
                TextEntry::make('lose')
                    ->numeric(),
                TextEntry::make('goals')
                    ->numeric(),
                TextEntry::make('conceded')
                    ->numeric(),
                TextEntry::make('points')
                    ->numeric(),
                IconEntry::make('champion')
                    ->boolean(),
                IconEntry::make('is_wl_team')
                    ->boolean(),
                TextEntry::make('status')
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
