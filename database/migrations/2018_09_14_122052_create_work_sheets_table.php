<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('job_type_id')->nullable();
            $table->unsignedInteger('work_code_id');
            $table->boolean('worked');
            $table->time('from');
            $table->time('to');
            $table->float('work_hrs');
            $table->float('actual_work_hrs');
            $table->float('hr_rate');
            $table->float('hr_cost');
            $table->float('actual_hr_cost');
            $table->text('remark')->nullable();
            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('customers')->onDelte('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelte('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelte('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelte('cascade');
            $table->foreign('work_code_id')->references('id')->on('work_codes')->onDelte('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_sheets');
    }
}
