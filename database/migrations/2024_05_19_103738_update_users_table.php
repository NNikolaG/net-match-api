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
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->enum('skill_level', ['Beginner', 'Intermediate', 'Advanced', 'Professional'])->default('Beginner');
            $table->boolean('availability')->default(true);
            $table->string('city');
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->unsignedInteger('club_id')->nullable();

            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['last_name', 'phone_number', 'address', 'skill_level', 'availability', 'city', 'bio', 'profile_picture', 'date_of_birth', 'gender', 'club_id']);
        });
    }
};
