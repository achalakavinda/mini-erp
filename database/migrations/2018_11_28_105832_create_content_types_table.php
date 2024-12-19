<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('icon')->default('https://itinerant.s3-ap-southeast-1.amazonaws.com/icon/accomodation.png');
            $table->string('code')->unique();
            $table->boolean('access_to_blog')->default(1);
            $table->boolean('access_to_place')->default(1);
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('content_types');
    }
}
