<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_measurements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });


        Schema::create('item_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('brand_id');
            $table->string('description')->nullable();
            $table->text('thumbnail_url')->default("https://f0.pngfuel.com/png/1006/626/valentine-day-frame-valentines-day-decorative-ornament-for-frame-red-and-brown-heart-frame-png-clip-art-thumbnail.png");

            $table->float('unit_cost');
            $table->float('selling_price');
            $table->float('nbt_tax_percentage')->default(0);
            $table->float('vat_tax_percentage')->default(0);
            $table->float('unit_price_with_tax');


            $table->float('opening_stock_qty')->default(0);
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('company_division_id');
            $table->unsignedInteger('type_measurement_id')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('type_measurement_id')->references('id')->on('type_measurements');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('company_division_id')->references('id')->on('company_divisions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_codes');
        Schema::dropIfExists('type_measurements');
    }
}
