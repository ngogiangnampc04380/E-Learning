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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->text('description');
            $table->string('thumbnail');
            $table->decimal('price',7,3);
            $table->integer('view');
            $table->integer('enrollment');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('course_categories')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('mentor_id');
            $table->foreign('mentor_id')->references('id')->on('mentors')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
