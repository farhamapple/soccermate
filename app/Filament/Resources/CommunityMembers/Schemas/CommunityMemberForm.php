<?php

namespace App\Filament\Resources\CommunityMembers\Schemas;

use App\Models\Community;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CommunityMemberForm
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
                Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id')) // Ambil name dan id dari User
                    ->searchable() // Opsional: Tambah fitur search di dropdown
                    ->required()
                    ->preload(), // Preload data agar langsung muncul
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
