<?php

use App\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->enum('dimension', [
                Question::DIMENSION_EI,
                Question::DIMENSION_SN,
                Question::DIMENSION_TF,
                Question::DIMENSION_JP
            ]);
            $table->tinyInteger('direction');

            $table->integer('sort_order');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('questions');
    }
}
