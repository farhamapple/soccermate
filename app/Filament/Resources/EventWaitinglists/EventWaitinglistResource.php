<?php

namespace App\Filament\Resources\EventWaitinglists;

use App\Filament\Resources\EventWaitinglists\Pages\CreateEventWaitinglist;
use App\Filament\Resources\EventWaitinglists\Pages\EditEventWaitinglist;
use App\Filament\Resources\EventWaitinglists\Pages\ListEventWaitinglists;
use App\Filament\Resources\EventWaitinglists\Pages\ViewEventWaitinglist;
use App\Filament\Resources\EventWaitinglists\Schemas\EventWaitinglistForm;
use App\Filament\Resources\EventWaitinglists\Schemas\EventWaitinglistInfolist;
use App\Filament\Resources\EventWaitinglists\Tables\EventWaitinglistsTable;
use App\Models\EventWaitinglist;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EventWaitinglistResource extends Resource
{
    protected static ?string $model = EventWaitinglist::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'WaitingList';

    public static function form(Schema $schema): Schema
    {
        return EventWaitinglistForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EventWaitinglistInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventWaitinglistsTable::configure($table);
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
            'index' => ListEventWaitinglists::route('/'),
            'create' => CreateEventWaitinglist::route('/create'),
            'view' => ViewEventWaitinglist::route('/{record}'),
            'edit' => EditEventWaitinglist::route('/{record}/edit'),
        ];
    }
}
