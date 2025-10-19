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
        Schema::create('landing_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('header_title')->nullable();
            $table->string('header_image')->nullable();
            $table->text('header_description')->nullable();
            $table->string('footer_image')->nullable();
            $table->text('footer_description')->nullable();
            $table->boolean('most_required_courses')->default('1');
            $table->boolean('recommend_courses')->default('1');
            $table->boolean('top_rated_courses')->default('1');
            $table->boolean('star_recently_courses')->default('1');
            $table->boolean('tracks')->default('1');
            $table->boolean('instructors')->default('1');
            $table->boolean('workteam')->default('1');
            $table->boolean('parteners')->default('1');
            $table->boolean('student_opinion')->default('1');
            $table->boolean('map_locations')->default('1');
            $table->boolean('achievements')->default('1');
            $table->boolean('letter_news')->default('1');
            $table->integer('start_soon_period')->default('30');
            $table->integer('letter_news')->default('1');
            $table->string('book_shop_url')->nullable();
            $table->integer('verification_expire_time_in_seconds')->default(30);



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_settings');
    }
};
