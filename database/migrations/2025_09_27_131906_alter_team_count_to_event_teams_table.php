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
        Schema::table('event_teams', function (Blueprint $table) {
            // Ubah Nama Field team_count menjadi team_classement
            $table->dropColumn('team_count');
            $table->integer('team_classement')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_teams', function (Blueprint $table) {
            //
            $table->dropColumn('team_classement');
            $table->integer('team_count')->nullable()->after('name');
        });
    }
};
