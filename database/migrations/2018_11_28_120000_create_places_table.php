<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('places', function (Blueprint $table) {

            //table ID
            $table->bigIncrements('id');
            $table->enum('type', ['destination','accommodation'])->default('destination');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('member_id')->nullable();
            $table->unsignedInteger('content_type_id');
            $table->unsignedInteger('category_id');
            $table->longText('category_name');
            $table->longText('category_slug');
            $table->string('slug')->unique();

            //table content
            $table->longText('title');
            $table->longText('summary')->nullable();
            $table->longText('description')->nullable();
            $table->longText('post')->nullable();
            $table->longText('content')->nullable();
            $table->text('contact')->nullable();
            $table->text('email')->nullable();
            $table->text('address')->nullable();
            $table->longText('thumbnail')->nullable();


            //third party
            $table->text('booking_url')->nullable();
            $table->float('booking_min_price')->nullable();
            $table->float('booking_rating')->nullable()->default(0);

            $table->text('website_url')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('pinterest_url')->nullable();


            //location
            $table->string('location')->nullable();
            $table->string('google_location_description')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();


            //configurations
            $table->longText('preview_content')->nullable();
            $table->boolean('show')->default(false);
            $table->enum('status',['draft','publish'])->default('draft');
            $table->bigInteger('clicks')->default(0);
            $table->bigInteger('views')->default(0);
            $table->boolean('publish')->default(0);
            $table->boolean('is_feature')->default(0);
            $table->boolean('is_popular')->default(0);


            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('member_id')
                ->references('id')
                ->on('members');

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
        Schema::dropIfExists('places');
    }
}
