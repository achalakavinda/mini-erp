<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_location', function (Blueprint $table) {
            $table->increments('id');
            $table->text('geo_long')->nullable();
            $table->text('geo_lat')->nullable();
            $table->text('name');
            $table->text('address')->nullable();
            $table->unsignedInteger('supervisor_id')->nullable();
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
        Schema::dropIfExists('stock_location');
    }
}
