<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('question_number_in_group');
            $table->text('title');
            $table->string('picture')->nullable();
            $table->foreignId('group_id')->references('id')->on('bank_groups')->onDelete('cascade');
            $table->boolean('active')->default('1');
            $table->string('mark');
            $table->string('model_answer');
            $table->json('choices')->nullable();
            $table->text('question_notes')->nullable();
            $table->string('question_declare_img')->nullable();
            $table->text('answer_notes')->nullable();
            $table->string('answer_declare_img')->nullable();
            $table->string('answer_video_link')->nullable();
            $table->text('answer1')->nullable();
            $table->text('answer2')->nullable();
            $table->text('answer3')->nullable();
            $table->text('answer1')->nullable();
            $table->integer('correct_answer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_questions');
    }
}
