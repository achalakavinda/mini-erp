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
            $table->string('customer_name')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('project_id')->nullable();
            $table->string('project_code')->nullable();
            $table->unsignedInteger('job_type_id')->nullable();
            $table->string('job_type')->nullable();
            $table->unsignedInteger('sector_id')->nullable();
            $table->string('sector_name')->nullable();
            $table->unsignedInteger('work_code_id');
            $table->string('work_code')->nullable();

            $table->boolean('worked');
            $table->time('from');
            $table->time('to');

            $table->float('work_hrs');
            $table->float('leave_hrs');

            $table->float('hr_rate')->default(0);
            $table->float('hr_cost')->default(0);
            $table->float('actual_work_hrs')->default(0);
            $table->float('actual_hr_cost')->default(0);

            $table->float('extra_work_hrs')->default(0);
            $table->text('remark')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelte('cascade');
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
