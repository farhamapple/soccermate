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
        Schema::create('event_waitinglists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->foreignId('community_member_id')->constrained('community_members')->cascadeOnDelete();
            $table->dateTime('registered_at')->nullable();
            $table->string('status')->default('waiting'); // waiting | canceled | confirm
            $table->timestamps();

            $table->unique(['event_id', 'community_member_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_waitinglists');
    }
};
