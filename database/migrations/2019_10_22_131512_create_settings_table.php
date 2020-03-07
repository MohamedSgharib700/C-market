<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(1);
            $table->text('image');
            $table->timestamps();
            $table->softDeletes();
        });

          Schema::create('settings_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('setting_id')->unsigned();
            $table->text('description');
            $table->string('locale')->index();
            $table->timestamps();
            $table->unique(['setting_id','locale']);
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
            Schema::dropIfExists('settings_translations');
    }
}
