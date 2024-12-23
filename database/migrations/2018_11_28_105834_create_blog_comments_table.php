<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('email');
            $table->text('user_name');
            $table->longText('user_image');
            $table->unsignedInteger('blog_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('parent_comment_id')->nullable();//blog tag feature

            $table->enum('status',['draft','report','block','show']);


            $table->longText('comment');
            $table->integer('clicks')->default(0);
            $table->integer('views')->default(0);
            $table->integer('comments')->default(0);
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
        Schema::dropIfExists('blog_comments');
    }
}
