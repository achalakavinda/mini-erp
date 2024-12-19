<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //link between content page to meta tags
        Schema::create('site_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('path')->unique()->nullable();
            $table->unsignedInteger('blog_id')->unique()->nullable();
            $table->unsignedBigInteger('place_id')->unique()->nullable();
            $table->enum('type',['site','blog','place'])->default('site');
            $table->boolean('set')->default(false);
            $table->timestamps();

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs');

            $table->foreign('place_id')
                ->references('id')
                ->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_metas');
    }
}
