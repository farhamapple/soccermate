<?php

namespace App\Filament\Resources\EventMatches;

use App\Filament\Resources\EventMatches\Pages\CreateEventMatch;
use App\Filament\Resources\EventMatches\Pages\EditEventMatch;
use App\Filament\Resources\EventMatches\Pages\ListEventMatches;
use App\Filament\Resources\EventMatches\Pages\ViewEventMatch;
use App\Filament\Resources\EventMatches\Schemas\EventMatchForm;
use App\Filament\Resources\EventMatches\Schemas\EventMatchInfolist;
use App\Filament\Resources\EventMatches\Tables\EventMatchesTable;
use App\Models\EventMatch;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EventMatchResource extends Resource
{
    protected static ?string $model = EventMatch::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Match';

    public static function form(Schema $schema): Schema
    {
        return EventMatchForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EventMatchInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventMatchesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEventMatches::route('/'),
            'create' => CreateEventMatch::route('/create'),
            'view' => ViewEventMatch::route('/{record}'),
            'edit' => EditEventMatch::route('/{record}/edit'),
        ];
    }
}
