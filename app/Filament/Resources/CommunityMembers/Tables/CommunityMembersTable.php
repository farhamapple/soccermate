<?php

namespace App\Filament\Resources\CommunityMembers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CommunityMembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->label('User ID')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('number_event')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('number_match')
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
                    ->numeric()
                    ->sortable(),
                TextColumn::make('team_conceded')
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
