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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('userName')->unique();
            $table->string('password');
            $table->text('qualifications');
            $table->integer('track_id');
            $table->integer('country_id');
            $table->text('about_teacher');
            $table->string('image')->nullable();
            $table->string('cv')->nullable();
            $table->string('bank_account')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('recommened')->default(1);
            $table->boolean('is_employee')->default(0);
            $table->double('salary');
            $table->double('current_balance')->default(0);
            $table->double('total_balance')->default(0);
            $table->string('cash_wallet_number')->nullable();
            $table->string('paypall_account_number')->nullable();



            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
