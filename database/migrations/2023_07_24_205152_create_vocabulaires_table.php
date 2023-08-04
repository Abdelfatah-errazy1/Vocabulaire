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
        Schema::create('vocabulaires', function (Blueprint $table) {
            $table->id();
            $table->string('word',50)->unique();
            $table->text('definition');
            $table->foreignId('quiz')->references('id')->on('quizzes');
            $table->foreignId('user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocabulaires');
    }
};
