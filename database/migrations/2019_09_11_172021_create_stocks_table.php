<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('created_date')->default(\Carbon\Carbon::now());
            $table->unsignedInteger('stock_location_id')->nullable();
            $table->unsignedInteger('company_division_id')->nullable();
            $table->timestamps();
            $table->foreign('stock_location_id')->references('id')->on('stock_location')->onDelete('cascade');
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
        Schema::dropIfExists('stocks');
    }
}
