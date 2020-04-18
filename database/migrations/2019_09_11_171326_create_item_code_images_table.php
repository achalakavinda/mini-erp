<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCodeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_code_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_code_id');
            $table->string('img_url');
            $table->boolean('show')->default(1);
            $table->timestamps();

            $table->foreign('item_code_id')->references('id')->on('item_codes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_code_images');
    }
}
