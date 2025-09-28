<?php

namespace App\Filament\Resources\EventTeams\RelationManagers;

use App\Models\CommunityMember;
use App\Models\Event;
use App\Models\EventTeam;
use App\Models\EventTeamMember;
use Filament\Actions\Action;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class EventTeamMembersRelationManager extends RelationManager
{
    protected static string $relationship = 'eventTeamMembers';

    public function form(Schema $schema): Schema
    {
        $eventTeam = $this->getOwnerRecord();
        $communityMember = CommunityMember::with('user')->where('community_id', $eventTeam->event->community_id)->get()->pluck('user.name', 'id')->toArray();

        return $schema
            ->components([
                // Buat Select untuk Mendapatkan event_id dan community_member_id secara otomatis dari
                Hidden::make('event_id')  // Otomatis ambil dari parent Event
                    ->default(fn() => $eventTeam->event_id),  // Akses parent record di sini
                Hidden::make('event_team_id')  // Otomatis ambil dari parent Event
                    ->default(fn() => $eventTeam->id),  // Akses parent record di sini
                Select::make('community_member_id')  // Ubah ke Select untuk pilihan otomatis
                    ->label('Community Member')
                    ->required()
                    ->options($communityMember)  // Ambil nama user dari CommunityMember
                    ->searchable(),  // Optional: buat searchable jika daftar panjang,
                TextInput::make('goals_scored')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('cards')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_present')
                    ->required()
                    ->default(true),
                Toggle::make('is_wl_team')
                    ->required()
                    ->default(false),
                TextInput::make('position'),
            ]);
    }

    public function table(Table $table): Table
    {

        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('goals_scored')
                    ->label('Goals')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cards')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_present')
                    ->label('Present')
                    ->boolean(),
                IconColumn::make('is_wl_team')
                    ->label('WL')
                    ->boolean(),
                TextColumn::make('position')
                    ->label('Position')
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
            ->headerActions([
                Action::make('Add Player')
                    ->form(function (Action $action) {
                        // $record = $action->getRecord(); // Akses record dari row tabel
                        //             $communityMember = CommunityMember::with('user')->where('community_id', $this->ownerRecord->event->community_id)->get();
                        //             $communityMemberArray = $communityMember->mapWithKeys(function ($communityMember) {
                        //     return [$communityMember->id . '::' . $communityMember->user->name => $communityMember->user->name];
                        // })

                        return [
                            Repeater::make('players')
                                ->label('Tambah Pemain')
                                ->simple(
                                    Select::make('community_member_id')
                                        ->label('Community Member')
                                        ->required()
                                        ->options(function () {
                                            return CommunityMember::with('user')
                                                ->where('community_id', $this->ownerRecord->event->community_id)
                                                ->get()
                                                ->mapWithKeys(function ($communityMember) {
                                                    return [$communityMember->id . '::' . $communityMember->user->name => $communityMember->user->name];
                                                })
                                                ->toArray();
                                        })
                                        ->searchable()
                                )
                                ->defaultItems($this->ownerRecord->event->type == 'minisoccer' ? 8 : 11) // Ganti 'jumlah_pemain' dengan field yang sesuai di model $record-mu
                        ];
                    })
                    ->action(function (array $data): void {
                        foreach ($data['players'] as $playerData) {
                            $expl = explode('::', $playerData);
                            $community_member_id = $expl[0];
                            $name = $expl[1];

                            EventTeamMember::create([
                                'event_id' => $this->ownerRecord->event_id,
                                'event_team_id' => $this->ownerRecord->id,
                                'community_member_id' => $community_member_id,
                                'name' => $name,
                                'goals_scored' => 0,
                                'cards' => 0,
                                'is_present' => true,
                                'is_wl_team' => false,
                                'position' => null,
                            ]);
                        }
                    })
                    ->icon('heroicon-o-user-group')
                    ->color('success'),
                CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
