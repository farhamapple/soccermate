<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('community_member_id')
                    ->numeric(),
                TextInput::make('community_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('date_event')
                    ->required(),
                DateTimePicker::make('start_date_registration'),
                DateTimePicker::make('end_date_registration'),
                TextInput::make('type')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('team_count')
                    ->required()
                    ->numeric()
                    ->default(4),
                TextInput::make('htm')
                    ->numeric(),
                TextInput::make('match_count')
                    ->required()
                    ->numeric()
                    ->default(6),
            ]);
    }
}
