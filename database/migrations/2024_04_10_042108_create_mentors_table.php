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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name',255)->nullable();
            $table->string('name_banking',255)->nullable();
            $table->string('id_banking',255)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->cascadeOnDelete();
            $table->string('front_card')->nullable();
            $table->string('back_card')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
