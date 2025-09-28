<?php

namespace App\Filament\Resources\EventTeams\Tables;

use App\Models\EventTeamMember;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class EventTeamsTable
{
    public static function configure(Table $table): Table
    {
        Log::info(json_encode($table, JSON_PRETTY_PRINT));
        return $table
            ->columns([
                TextColumn::make('event.name')
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('win')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('draw')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lose')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('goals')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('conceded')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('points')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('champion')
                    ->boolean(),
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
                // Action::make('Player')
                //     ->schema([
                //         Select::make('user_id')
                //             ->label('Player')
                //             ->searchable()
                //             ->options(User::query()->pluck('name', 'id'))
                //             ->required(),
                //     ])
                //     ->action(function (array $data, EventTeamMember $record): void {
                //         //$record->author()->associate($data['authorId']);
                //         //$record->save();
                //     })
                //     ->modalWidth('md')
                //     ->icon('heroicon-o-user-group')
                //     ->color('success'),
                // Masukkan repeater pada Action

                // Action::make('Player')->schema(
                //     [
                //         Repeater::make('players')
                //             ->label($record->event()->id)
                //             ->simple(
                //                 Select::make('user_id')
                //                     ->label('Player')
                //                     ->searchable()
                //                     ->options(User::query()->pluck('name', 'id'))
                //                     ->required(),
                //             )->defaultItems(8)
                //     ]
                // )->icon('heroicon-o-user-group')->color('sucess'),

                // Action::make('Player')
                //     ->form(function (Action $action) {
                //         $record = $action->getRecord(); // Akses record dari row tabel

                //         return [
                //             Repeater::make('players')
                //                 ->label('Tambah Pemain')
                //                 ->simple(
                //                     Select::make('user_id')
                //                         ->label('Player')
                //                         ->searchable()
                //                         ->options(User::query()->pluck('name', 'id'))
                //                         ->required(),
                //                 )
                //                 ->defaultItems($record->event->type == 'minisoccer' ? 8 : 11) // Ganti 'jumlah_pemain' dengan field yang sesuai di model $record-mu
                //         ];
                //     })
                //     ->icon('heroicon-o-user-group')
                //     ->color('success'),
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
