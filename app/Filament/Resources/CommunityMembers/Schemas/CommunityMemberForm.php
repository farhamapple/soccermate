<?php

namespace App\Filament\Resources\CommunityMembers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CommunityMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('community_id')
                    ->required()
                    ->numeric(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Toggle::make('is_active')
                    ->required(),
                DatePicker::make('join_date'),
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
                TextInput::make('goal')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('team_goal')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('team_conceded')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('champions')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('position'),
            ]);
    }
}
