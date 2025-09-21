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
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');

            // siapa yang buat event (opsional)
            $table->foreignId('community_member_id')->nullable()
                ->constrained('community_members')->nullOnDelete();

            $table->foreignId('community_id')->constrained('communities')->cascadeOnDelete();

            $table->string('name');
            $table->dateTime('start_date_event')->nullable();
            $table->dateTime('start_date_registration')->nullable();
            $table->dateTime('end_date_registration')->nullable();

            // minisoccer / football
            $table->string('type');
            $table->boolean('is_active')->default(true);

            $table->integer('team_count')->default(4);   // jumlah tim
            $table->double('htm')->nullable();           // biaya (opsional)
            $table->integer('match_count')->default(6);  // default 6 pertandingan

            $table->timestamps();

            $table->index(['community_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
