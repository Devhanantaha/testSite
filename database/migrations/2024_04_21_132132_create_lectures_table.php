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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('level_id');
            $table->string('course_id');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('goals')->nullable();
            $table->text('conclusion')->nullable();
            $table->string('type');
            $table->string('appointment')->nullable();
            $table->string('link')->nullable();
            $table->string('provider')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('free')->default(0);
            $table->string('period')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
