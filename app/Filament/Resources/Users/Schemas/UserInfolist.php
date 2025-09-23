<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {

        return $schema
            ->components([
                Section::make('Detail')->schema([
                    TextEntry::make('name'),
                    TextEntry::make('email')
                        ->label('Email address'),
                    TextEntry::make('email_verified_at')
                        ->dateTime()
                        ->placeholder('-'),
                    TextEntry::make('phone')
                        ->placeholder('-'),
                    TextEntry::make('join_date')
                        ->date()
                        ->placeholder('-'),
                    ImageEntry::make('photos')
                        ->placeholder('-'),
                    TextEntry::make('created_at')
                        ->dateTime()
                        ->placeholder('-'),
                    TextEntry::make('updated_at')
                        ->dateTime()
                        ->placeholder('-'),
                ])->columnSpanFull()->columns(2)
            ]);
    }
}
