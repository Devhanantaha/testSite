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
            $table->string('name')->nullable();
            $table->double('price')->default();
            $table->integer('course_type_id')->nullable();
            $table->date('published_at')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('recommend')->default(0);
            $table->string('image')->nullable();
            $table->string('background_image')->nullable();
            $table->string('thumbinal_image')->nullable();
            $table->string('promo_url')->nullable();
            $table->string('level')->nullable();
            $table->text('description')->nullable();
            $table->text('goals')->nullable();
            $table->text('directedTo')->nullable();
            $table->text('prerequisites')->nullable();
            $table->double('price_with_discount')->nullable();
            $table->string('difficulty_level')->nullable();
            $table->integer('provider')->nullable();
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
