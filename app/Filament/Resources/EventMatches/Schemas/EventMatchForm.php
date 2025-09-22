<?php

namespace App\Filament\Resources\EventMatches\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EventMatchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('event_id')
                    ->required()
                    ->numeric(),
                TextInput::make('home_team_id')
                    ->required()
                    ->numeric(),
                TextInput::make('away_team_id')
                    ->required()
                    ->numeric(),
                TextInput::make('home_score')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('away_score')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('order')
                    ->numeric(),
                DateTimePicker::make('match_date'),
            ]);
    }
}
