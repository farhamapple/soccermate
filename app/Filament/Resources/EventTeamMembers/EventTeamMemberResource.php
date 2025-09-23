<?php

namespace App\Filament\Resources\EventTeamMembers;

use App\Filament\Resources\EventTeamMembers\Pages\CreateEventTeamMember;
use App\Filament\Resources\EventTeamMembers\Pages\EditEventTeamMember;
use App\Filament\Resources\EventTeamMembers\Pages\ListEventTeamMembers;
use App\Filament\Resources\EventTeamMembers\Pages\ViewEventTeamMember;
use App\Filament\Resources\EventTeamMembers\Schemas\EventTeamMemberForm;
use App\Filament\Resources\EventTeamMembers\Schemas\EventTeamMemberInfolist;
use App\Filament\Resources\EventTeamMembers\Tables\EventTeamMembersTable;
use App\Models\EventTeamMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EventTeamMemberResource extends Resource
{
    protected static ?int $navigationSort = 4;

    protected static string | UnitEnum | null $navigationGroup = 'Transactions';

    protected static ?string $model = EventTeamMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'Event Team Members';

    public static function form(Schema $schema): Schema
    {
        return EventTeamMemberForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EventTeamMemberInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventTeamMembersTable::configure($table);
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
            'index' => ListEventTeamMembers::route('/'),
            'create' => CreateEventTeamMember::route('/create'),
            'view' => ViewEventTeamMember::route('/{record}'),
            'edit' => EditEventTeamMember::route('/{record}/edit'),
        ];
    }
}
