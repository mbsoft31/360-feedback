<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_attempts', function (Blueprint $table) {
            $table->id();
            $table->string('attempt_on');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("survey_id");
            $table->foreign("user_id")
                ->on("users")
                ->references("id")
                ->onDelete("cascade");
            $table->foreign("survey_id")
                ->on("surveys")
                ->references("id")
                ->onDelete("cascade");
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
        Schema::dropIfExists('survey_attempts');
    }
}
