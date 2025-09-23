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
        Schema::create('event_team_members', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->foreignId('community_member_id')->constrained('community_members')->cascadeOnDelete();

            // (opsional) kalau mau relasi eksplisit ke event_teams
            $table->foreignId('event_team_id')->nullable()->constrained('event_teams')->nullOnDelete();

            $table->string('name')->nullable(); // snapshot nama ketika event (kalau diperlukan)
            $table->integer('goals_scored')->default(0);
            $table->integer('cards')->default(0);                // total kartu (kuning/merah)
            //$table->integer('matches_without_goal')->default(0); // sesuai ERD terakhir
            $table->boolean('is_present')->default(true);
            $table->boolean('is_wl_team')->default(false);
            //$table->string('status')->nullable(); // waiting, cancel, confirm (jika dipakai)
            $table->string('position')->nullable();              // GK/DF/MF/FW

            $table->timestamps();

            $table->unique(['event_id', 'community_member_id']); // pemain 1x per event
            $table->index(['event_id', 'event_team_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_team_members');
    }
};
