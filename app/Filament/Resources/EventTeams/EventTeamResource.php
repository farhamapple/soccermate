<?php

namespace App\Filament\Resources\EventTeams;

use App\Filament\Resources\EventTeams\Pages\CreateEventTeam;
use App\Filament\Resources\EventTeams\Pages\EditEventTeam;
use App\Filament\Resources\EventTeams\Pages\ListEventTeams;
use App\Filament\Resources\EventTeams\Pages\ViewEventTeam;
use App\Filament\Resources\EventTeams\Schemas\EventTeamForm;
use App\Filament\Resources\EventTeams\Schemas\EventTeamInfolist;
use App\Filament\Resources\EventTeams\Tables\EventTeamsTable;
use App\Models\EventTeam;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EventTeamResource extends Resource
{
    protected static ?int $navigationSort = 2;

    protected static string | UnitEnum | null $navigationGroup = 'Transactions';

    protected static ?string $model = EventTeam::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Home;

    protected static ?string $recordTitleAttribute = 'Teams';



    public static function form(Schema $schema): Schema
    {
        return EventTeamForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EventTeamInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventTeamsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function canCreate(): bool
    {
        return false; // Tombol Create akan hilang
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEventTeams::route('/'),
            //'create' => CreateEventTeam::route('/create'),
            'view' => ViewEventTeam::route('/{record}'),
            'edit' => EditEventTeam::route('/{record}/edit'),
        ];
    }
}
