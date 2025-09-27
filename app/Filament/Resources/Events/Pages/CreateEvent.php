<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use App\Models\EventMatch;
use App\Models\EventTeam;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function afterCreate(): void
    {
        // Tambahkan log
        Log::info('Event created by user ID: ' . Auth::id() . ', Event ID: ' . $this->record->id);

        // Create Data Event Team sesuai dengan team_count
        $teamCount = $this->record->team_count;
        for ($i = 1; $i <= $teamCount; $i++) {
            EventTeam::create([
                'event_id' => $this->record->id,
                'name' => 'Team ' . $i,
                'team_classement' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Buat Event Match sesuai dengan match_count
        // Logikanya adalah untuk membuat jadwal pertandigan round-robin, perhatikan juga, antara Team maksimal match 2 kali berturut-turut dalam bermain, yang penting semua team dapat bertemu 1 kali.
        // Misal team_count = 4, maka akan ada 6 pertandingan, pertandingan 1 vs 2, 3 vs 4, 1 vs 3, 2 vs 4, 1 vs 4, 2 vs 3. dibuat juga secara random tidak harus mengikuti seperti ini
        // home_team_id dan away_team_id diambil dari EventTeam yang sudah dibuat sebelumnya
        // Untuk penentuan jadwal pertandingan, bisa menggunakan algoritma round-robin tournament scheduling
        // Referensi: https://en.wikipedia.org/wiki/Round-robin_tournament#Scheduling
        // https://stackoverflow.com/questions/6648512/scheduling-algorithm-for-round-robin-tournament
        // https://www.devenezia.com/round-robin-algorithm-in-php/
        // https://medium.com/@mohamedelgendy/scheduling-algorithm-for-round-robin-tournament-using-php-5f4d8f4b8a2a
        // https://gist.github.com/tony19/1376517
        $matchCount = $this->record->match_count;
        $teams = EventTeam::where('event_id', $this->record->id)->pluck('id')->toArray();
        $numTeams = count($teams);  // Menghitung jumlah tim
        $numMatches = ($numTeams - 1) * 2;  // Menghitung jumlah pertandingan
        $matches = [];

        for ($i = 0; $i < $numMatches; $i++) {
            $homeTeamId = $teams[$i % $numTeams];
            $awayTeamId = $teams[($i + 1) % $numTeams];
            $matches[] = [
                'event_id' => $this->record->id,
                'home_team_id' => $homeTeamId,
                'away_team_id' => $awayTeamId,
                'order' => $i + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        EventMatch::insert($matches);
    }
}
