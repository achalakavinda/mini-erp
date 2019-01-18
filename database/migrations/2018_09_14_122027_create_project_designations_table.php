<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
 * this information are use to store the project assign costs
 * */

class CreateProjectDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_designations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('project_designation_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->double('hr')->default(0);
            $table->double('hr_rates')->default(0);
            $table->double('total')->default(0);
            $table->timestamps();
            $table->unsignedInteger('created_by_id');
            $table->unsignedInteger('updated_by_id');

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('project_designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('created_by_id')->references('id')->on('users');
            $table->foreign('updated_by_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_designations');
    }
}
