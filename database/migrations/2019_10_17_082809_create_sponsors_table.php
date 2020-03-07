<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sponsors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->nestedSet();
            $table->string('image')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

          Schema::create('sponsors_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sponsor_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();
            $table->timestamps();
            $table->unique(['sponsor_id','locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
        Schema::dropIfExists('sponsors_translations');
    }
}
