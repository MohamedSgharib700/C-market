<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('brands_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('brand_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();
            $table->timestamps();
            $table->unique(['brand_id','locale']);
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
        Schema::dropIfExists('brands');
        Schema::dropIfExists('brands_translations');
    }
}
