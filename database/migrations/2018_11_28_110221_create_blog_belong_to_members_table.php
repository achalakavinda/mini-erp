<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogBelongToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_belong_to_members', function (Blueprint $table) {
            $table->unsignedInteger('blog_id');
            $table->unsignedInteger('member_id');
            $table->timestamps();

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs');
            $table->foreign('member_id')
                ->references('id')
                ->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_belong_to_members');
    }
}
