<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectJobTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_job_types', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('jop_type_id');

            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('jop_type_id')->references('id')->on('job_types')->onDelte('cascade');
            $table->primary(array('project_id','jop_type_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_job_types');
    }
}
