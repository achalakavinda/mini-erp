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
            $table->unsignedInteger('company_division_id')->nullable();
            $table->timestamps();
            $table->foreign('company_division_id')->references('id')->on('company_divisions')->onDelete('cascade');
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
