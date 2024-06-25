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

        Schema::create('match_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('challenger_id')->constrained('users');
            $table->foreignId('opponent_id')->constrained('users');
            $table->enum('status', ['accepted', 'declined', 'pending'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_requests');
    }
};
