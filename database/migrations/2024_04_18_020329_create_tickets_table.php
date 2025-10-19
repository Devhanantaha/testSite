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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('phone',64)->nullable();
            $table->string('name',64)->nullable();
            $table->string('email',64)->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('instructor_id')->nullable();
            $table->string('title',64);
            $table->boolean('read')->default('0');
            $table->string('description',64);

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
