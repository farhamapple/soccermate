<?php

namespace App\Filament\Resources\CommunityMembers;

use App\Filament\Resources\CommunityMembers\Pages\CreateCommunityMember;
use App\Filament\Resources\CommunityMembers\Pages\EditCommunityMember;
use App\Filament\Resources\CommunityMembers\Pages\ListCommunityMembers;
use App\Filament\Resources\CommunityMembers\Pages\ViewCommunityMember;
use App\Filament\Resources\CommunityMembers\Schemas\CommunityMemberForm;
use App\Filament\Resources\CommunityMembers\Schemas\CommunityMemberInfolist;
use App\Filament\Resources\CommunityMembers\Tables\CommunityMembersTable;
use App\Models\CommunityMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CommunityMemberResource extends Resource
{
    protected static ?string $model = CommunityMember::class;


    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;

    protected static string | UnitEnum | null $navigationGroup = 'Master';

    protected static ?string $navigationLabel = 'Members';

    protected static ?string $recordTitleAttribute = 'Members';

    protected static ?string $breadcrumb = 'Members'; // breadcrumb di atas


    public static function form(Schema $schema): Schema
    {
        return CommunityMemberForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CommunityMemberInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommunityMembersTable::configure($table);
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
            'index' => ListCommunityMembers::route('/'),
            'create' => CreateCommunityMember::route('/create'),
            'view' => ViewCommunityMember::route('/{record}'),
            'edit' => EditCommunityMember::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'List Members'; // untuk List
    }

    public static function getModelLabel(): string
    {
        return 'Members'; // untuk singular (Create/Edit/View)
    }
}
