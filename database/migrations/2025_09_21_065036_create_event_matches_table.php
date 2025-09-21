<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();

            // tim dalam event
            $table->foreignId('home_team_id')->constrained('event_teams')->cascadeOnDelete();
            $table->foreignId('away_team_id')->constrained('event_teams')->cascadeOnDelete();

            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);

            $table->integer('order')->nullable(); // urutan match
            $table->dateTime('match_date')->nullable();

            $table->timestamps();

            $table->index(['event_id', 'match_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_matches');
    }
};
