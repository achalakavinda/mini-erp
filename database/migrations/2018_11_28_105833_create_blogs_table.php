<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('content_type_id');
            $table->unsignedInteger('category_id');
            $table->longText('category_name');
            $table->longText('category_slug');
            $table->longText('title');
            $table->string('slug')->unique();
            $table->longText('post');
            $table->longText('summery')->nullable();
            $table->longText('thumbnail')->default('https://www.itinerantnotes.com/blog-theme/images/logo.png');
            $table->string('parent_blog_id')->nullable();//blog tag feature

            $table->enum('status',['draft','publish']);

            //location
            $table->string('location')->nullable();
            $table->string('google_location_description')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();

            $table->bigInteger('clicks')->default(0);
            $table->bigInteger('views')->default(0);
            $table->bigInteger('comments')->default(0);


            $table->boolean('publish')->default(true);
            $table->boolean('is_feature')->default(1);
            $table->boolean('is_popular')->default(1);

            $table->softDeletes();

            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('content_type_id')
                ->references('id')
                ->on('content_types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
