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
        Schema::create('community_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('community_id')->constrained('communities')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->date('join_date')->nullable();

            // Statistik (sesuai ERD kamu – catatan: ini bisa dipindah ke level event bila mau)
            $table->integer('win')->default(0);
            $table->integer('draw')->default(0);
            $table->integer('lose')->default(0);
            $table->integer('goal')->default(0);
            $table->integer('points')->default(0);
            $table->integer('champions')->default(0);
            $table->json('position')->nullable();

            $table->timestamps();

            $table->unique(['community_id', 'user_id']);
            $table->index(['user_id', 'community_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunity_members');
    }
};
