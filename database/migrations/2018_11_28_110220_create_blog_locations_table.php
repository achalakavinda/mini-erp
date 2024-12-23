<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //any changes make to here must apply to places locations table
        Schema::create('blog_locations',function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('blog_id');
            $table->string('location');
            $table->string('description');
            $table->double('lat');
            $table->double('lng');
            $table->timestamps();

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_locations');

    }
}
