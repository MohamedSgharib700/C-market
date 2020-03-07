<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('discount');
            $table->boolean('feature')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('offers_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('offer_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('locale')->index();
            $table->timestamps();
            $table->unique(['offer_id','locale']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
