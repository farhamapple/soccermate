<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EventInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('community_member_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('community_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('start_date_event')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('start_date_registration')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('end_date_registration')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('type'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('team_count')
                    ->numeric(),
                TextEntry::make('htm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('match_count')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
