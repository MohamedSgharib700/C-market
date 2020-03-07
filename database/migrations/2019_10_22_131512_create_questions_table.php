<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

          Schema::create('questions_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();
            $table->timestamps();
            $table->unique(['question_id','locale']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('questions');
        Schema::dropIfExists('questions_translations');
    }
}
