<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteMetaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_meta_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('site_meta_id');
            $table->unsignedBigInteger('site_meta_seo_tag_id');
            $table->text('content');
            $table->primary(['site_meta_id','site_meta_seo_tag_id']);
            $table->timestamps();

            $table->foreign('site_meta_id')
                ->references('id')
                ->on('site_metas');

            $table->foreign('site_meta_seo_tag_id')
                ->references('id')
                ->on('site_meta_seo_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_meta_tags');
    }
}
