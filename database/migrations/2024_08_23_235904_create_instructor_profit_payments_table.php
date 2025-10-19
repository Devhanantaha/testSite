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
        Schema::create('instructor_profit_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_number');
            $table->string('payment_date');
            $table->integer('withdrawal_id')->nullable();
            $table->integer('instructor_id')->nullable();
            $table->double('paid_amount');
            $table->string('payment_method')->nullable();
            $table->string('attachment')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_profit_payments');
    }
};
