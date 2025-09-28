<?php

namespace App\Filament\Resources\EventTeams\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventTeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->required(),
                TextInput::make('win')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('draw')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('lose')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('goals')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('conceded')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('points')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('champion')
                    ->required(),
            ]);
    }
}
