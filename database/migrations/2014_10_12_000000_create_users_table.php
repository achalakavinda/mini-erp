<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('hometown_districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('cmb_location_districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });


        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img_url')->default("https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            $table->date('date_joined')->nullable();
            $table->text('mobile')->nullable();
            $table->text('residence')->nullable();
            $table->integer('hometown_district_id')->nullable();
            $table->text('hometown_city')->nullable();
            $table->integer('cmb_location_district')->nullable();
            $table->text('cmb_city')->nullable();
            $table->text('address')->nullable();

            $table->string('emp_no')->nullable();
            $table->string('epf_no')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->string('nic')->nullable();


            $table->integer('user_id')->default(-999);

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


            $table->rememberToken();
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();

        });

        DB::table('users')->insert([
            [
                'id'=>1,
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin123'),
                'date_joined'=>\Carbon\Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ca_trainings');
        Schema::dropIfExists('hometown_districts');
        Schema::dropIfExists('cmb_location_districts');
        Schema::dropIfExists('users');
    }
}
