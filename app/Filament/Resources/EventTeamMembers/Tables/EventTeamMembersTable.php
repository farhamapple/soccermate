<?php

namespace App\Filament\Resources\EventTeamMembers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventTeamMembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('community_member_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('event_team_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('goals_scored')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cards')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('matches_without_goal')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_present')
                    ->boolean(),
                TextColumn::make('team_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('position')
                    ->searchable(),
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
