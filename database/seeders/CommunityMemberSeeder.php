<?php

namespace Database\Seeders;

use App\Models\CommunityMember;
use Illuminate\Database\Seeder;

class CommunityMemberSeeder extends Seeder
{
    public function run(): void
    {
        $positions = ['Forward', 'Midfielder', 'Defender', 'Goalkeeper'];

        for ($i = 2; $i <= 10; $i++) {
            CommunityMember::create([
                'community_id' => 1, // PapaMuda FC id
                'user_id' => $i,
                'is_active' => true,
                'join_date' => now(),
                'number_event' => rand(5, 15),
                'number_match' => rand(10, 30),
                'win' => rand(5, 15),
                'draw' => rand(2, 8),
                'lose' => rand(2, 8),
                'goal' => rand(0, 20),
                'team_goal' => rand(20, 50),
                'team_conceded' => rand(10, 30),
                'champions' => rand(0, 3),
                'position' => $positions[array_rand($positions)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
