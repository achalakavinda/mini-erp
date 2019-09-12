<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('hometown_districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('cmb_location_districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ca_trainings');
        Schema::dropIfExists('hometown_districts');
        Schema::dropIfExists('cmb_location_districts');
    }
}
