<?php

namespace App\Filament\Resources\CommunityMembers\Tables;

use App\Filament\Resources\CommunityMembers\Schemas\CommunityMemberInfolist;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Width;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CommunityMembersTable
{
    // Method untuk infolist, panggil dari Schema class
    public static function infolist(Schema $schema): Schema
    {
        return CommunityMemberInfolist::configure($schema);
    }
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('user.photos')
                    ->label('Photo') // 'avatar' should be the column in your database storing the image path
                    ->imageHeight(40) // Optional: Adjust the height of the image
                    ->circular(), // Makes the image fully rounded,
                TextColumn::make('user.name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('number_event')
                    ->label('Events')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('number_match')
                    ->label('Matches')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('win')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('draw')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lose')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('goal')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('team_goal')
                    ->label('T Goals')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('team_conceded')
                    ->label('T Conceded')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('champions')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('join_date')
                    ->label('Join Date')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // Action::make('view')
                //     ->label('Cepat')
                //     ->icon('heroicon-o-eye')
                //     ->modalHeading('Detail User')
                //     ->modalWidth(Width::FiveExtraLarge)
                //     ->infolist(function (Schema $schema, $record) { // $record otomatis dari baris table
                //         return static::infolist($schema)->record($record); // Set record untuk isi data
                //     })
                //     ->action(fn() => null) // Tidak perlu logic, hanya buka modal
                //     ->modalSubmitAction(false) // Hilangkan tombol submit (read-only)
                //     ->modalCancelActionLabel('Tutup'),
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
