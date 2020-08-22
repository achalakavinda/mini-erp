<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('supervisor_user_id')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->integer('hometown_district_id')->nullable();
            $table->integer('cmb_location_district')->nullable();

            $table->date('date_joined')->default(\Carbon\Carbon::now());
            $table->text('mobile')->nullable();
            $table->text('email')->nullable();
            $table->text('residence')->nullable();
            $table->text('hometown_city')->nullable();
            $table->text('cmb_city')->nullable();
            $table->text('address')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('epf_no')->nullable();
            $table->string('nic')->nullable();
            $table->string('ca_agree_no')->nullable();
            $table->date('ca_training_period_from')->nullable();
            $table->date('ca_training_period_to')->nullable();
            $table->string('ca_training')->nullable();
            $table->double('basic_sal')->default(0);
            $table->double('epf_cost')->nullable();
            $table->double('etf_cost')->nullable();
            $table->double('allowance_cost')->nullable();
            $table->double('gratuity_cost')->nullable();
            $table->double('other_cost')->nullable();
            $table->double('cost')->default(0);
            $table->double('hr_rates')->default(0);
            $table->double('hr_billing_rates')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->foreign('updated_by')
                ->references('id')
                ->on('users');

            $table->foreign('supervisor_user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
