<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_facility_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('icon');
            $table->timestamps();
        });

        Schema::create('place_facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('place_id');
            $table->unsignedBigInteger('place_facility_type_id');
            $table->timestamps();

            $table->foreign('place_id')
                ->references('id')
                ->on('places')->onDelete('cascade');
            $table->foreign('place_facility_type_id')
                ->references('id')
                ->on('place_facility_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_facilities');
        Schema::dropIfExists('place_facility_types');
    }
}
