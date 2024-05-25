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
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('surface', ['Clay', 'Grass', 'Hard', 'Artificial Grass']);
            $table->boolean('indoor')->default(false); // Indoor court or Outdoor court
            $table->integer('length')->nullable(); // Length of the court
            $table->integer('width')->nullable(); // Width of the court
            $table->boolean('lighting')->default(false); // Type of lighting for the court
            $table->integer('capacity')->nullable(); // Seating capacity
            $table->string('location')->nullable(); // Location description such as quadrant of the facility it's located in
            $table->boolean('balls_provided')->default(false);
            $table->timestamps();

            $table->foreignId('club_id')->constrained()->onDelete('cascade'); // connects to clubs
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts');
    }
};
