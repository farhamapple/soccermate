<?php

namespace App\Filament\Resources\EventWaitinglists\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EventWaitinglistForm
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
                DateTimePicker::make('registered_at'),
                TextInput::make('status')
                    ->required()
                    ->default('waiting'),
            ]);
    }
}
