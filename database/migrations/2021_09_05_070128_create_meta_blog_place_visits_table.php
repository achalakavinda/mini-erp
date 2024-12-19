<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaBlogPlaceVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::connection('mysqlMetaDB')->create('meta_blog_place_visits', function (Blueprint $table) {
//            $table->id();
//            $table->string('blog_id')->nullable();
//            $table->string('place_id')->nullable();
//            $table->bigInteger('count')->default('100');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('meta_blog_place_visits');
    }
}
