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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('student_id')->unsigned();
            $table->integer('course_id')->unsigned()->nullable();
            $table->string('date')->nullable();
            $table->boolean('status')->default(0);
            $table->string('authority')->nullable();
            $table->string('file')->nullable();
            $table->string('image')->nullable();

            

 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
