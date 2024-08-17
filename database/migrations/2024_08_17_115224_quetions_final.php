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
        Schema::create('questions_final', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_final_id');
            $table->string('questions');
            $table->timestamps();
            $table->foreign('quiz_final_id')->references('id')->on('quiz_finals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};