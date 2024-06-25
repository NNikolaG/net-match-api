<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained('matches');
            $table->integer('set');
            $table->integer('challenger_games_won');
            $table->integer('opponent_games_won');
            $table->integer('challenger_tie_break_points')->default(null);
            $table->integer('opponent_tie_break_points')->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets');
    }
};
