<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceContactTabInfoTelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_contact_tab_info_tels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('place_id');
            $table->timestamps();

            $table->foreign('place_id')
                ->references('id')
                ->on('places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_contact_tab_info_tels');
    }
}
