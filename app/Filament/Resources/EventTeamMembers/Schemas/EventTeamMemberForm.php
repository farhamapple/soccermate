<?php

namespace App\Filament\Resources\EventTeamMembers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventTeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('event_id')
                    ->required()
                    ->numeric(),
                TextInput::make('community_member_id')
                    ->required()
                    ->numeric(),
                TextInput::make('event_team_id')
                    ->numeric(),
                TextInput::make('name'),
                TextInput::make('goals_scored')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('cards')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('matches_without_goal')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_present')
                    ->required(),
                TextInput::make('team_count')
                    ->numeric(),
                TextInput::make('position'),
            ]);
    }
}
