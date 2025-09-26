<?php

namespace App\Filament\Resources\CommunityMembers\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CommunityMemberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('community.name')
                    ->label('Community Name')
                    ->numeric(),
                TextEntry::make('user.name')
                    ->label('Member Name')
                    ->numeric(),
                TextEntry::make('win')
                    ->numeric(),
                TextEntry::make('draw')
                    ->numeric(),
                TextEntry::make('lose')
                    ->numeric(),
                TextEntry::make('goal')
                    ->numeric(),
                TextEntry::make('points')
                    ->numeric(),
                TextEntry::make('champions')
                    ->numeric(),
                IconEntry::make('is_active')
                    ->label('Active')
                    ->boolean(),
                TextEntry::make('join_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ])->columns(2);
    }
}
