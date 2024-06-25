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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('court_id')->default(null)->constrained('courts');
            $table->foreignId('match_request_id')->constrained('match_requests');
            $table->enum('type', ['training', 'exhibition', 'tournament', 'ranked'])->default('exhibition');
            $table->enum('status', ['negotiation', 'scheduled', 'played', 'canceled', 'postponed'])->default('negotiation');
            $table->boolean('challenger_conditions_agreed')->default(false);
            $table->boolean('opponent_conditions_agreed')->default(false);
            $table->foreignId('winner_id')->default(null)->constrained('users');
            $table->foreignId('tournament_id')->default(null)->constrained('tournaments');
            $table->time('duration')->default(null);
            $table->timestamp('scheduled_at')->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
