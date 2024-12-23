<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteMetaSeoTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //store all kind of use full meta tags
        Schema::create('site_meta_seo_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('group');
            $table->string('name')->unique();
            $table->string('property_type');
            $table->string('property');
            $table->text('description')->default('');
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
        Schema::dropIfExists('site_meta_seo_tags');
    }
}
