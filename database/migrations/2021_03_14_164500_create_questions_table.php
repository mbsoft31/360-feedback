<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencies', function (Blueprint $table) {
            $table->id();
            $table->string("label");
            $table->timestamps();
        });

        Schema::create('question_bank', function (Blueprint $table) {
            $table->id();
            $table->string("text");
            $table->unsignedBigInteger("competency_id");
            $table->foreign("competency_id")->on('competencies')->references('id');
            $table->timestamps();
        });

        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description")->nullable();
            $table->text("meta")->nullable();
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("text");
            $table->string("type");
            $table->text("meta")->nullable();
            $table->timestamps();
        });

        Schema::create('question_survey', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("question_id");
            $table->unsignedBigInteger("survey_id");
            $table->unsignedBigInteger("competency_id");
            $table->text("meta")->nullable();

            $table->foreign("question_id")->on("questions")->references("id")->cascadeOnDelete();
            $table->foreign("survey_id")->on("surveys")->references("id")->cascadeOnDelete();
            $table->foreign("competency_id")->on('competencies')->references('id')->cascadeOnDelete();
            //$table->timestamps();
        });

        /*Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->string("text");
            $table->string("order");
            $table->unsignedBigInteger("question_id");
            $table->foreign("question_id")->on("questions")->references("id");
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('competencies');
        Schema::dropIfExists('question_bank');
        Schema::dropIfExists('question_survey');
        /*Schema::dropIfExists('choices');*/
    }
}
