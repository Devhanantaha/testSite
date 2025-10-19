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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('track_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('lecture_id')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('total_mark')->default(0);
            $table->integer('duration_in_minutes')->default(0);
            $table->string('start_date')->default(0);
            $table->string('end_date')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
