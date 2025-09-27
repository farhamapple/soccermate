<?php

namespace App\Filament\Resources\Events\Schemas;

use App\Models\Community;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('community_id')
                    ->label('Community')
                    ->options(Community::all()->pluck('name', 'id'))
                    ->default(function () {
                        // Set default community_id jika diperlukan
                        return Community::first()?->id;
                    })
                    ->required(),
                Select::make('type')
                    ->options([
                        'minisoccer' => 'Minisoccer',
                        'football' => 'Football',
                    ])
                    ->required(),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('date_event')
                    ->required(),
                DateTimePicker::make('start_date_registration'),
                DateTimePicker::make('end_date_registration'),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->required(),
                TextInput::make('team_count')
                    ->required()
                    ->numeric()
                    ->default(4),
                TextInput::make('htm')
                    ->numeric()
                    ->default(0)
                    ->hidden(true),
                TextInput::make('match_count')
                    ->required()
                    ->numeric()
                    ->default(6),
            ]);
    }
}
