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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img_url')->default("https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            $table->date('date_joined');
            $table->text('mobile')->nullable();
            $table->text('residence')->nullable();
            $table->integer('hometown_district_id')->nullable();
            $table->text('hometown_city')->nullable();
            $table->integer('cmb_location_district')->nullable();
            $table->text('cmb_city')->nullable();

            $table->text('address')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('epf_no')->nullable();
            $table->integer('designation_id')->default(-999);
            $table->string('nic')->nullable();

            $table->integer('user_id')->default(-999);

            $table->string('ca_agree_no')->nullable();
            $table->date('ca_training_period_from')->nullable();
            $table->date('ca_training_period_to')->nullable();
            $table->string('ca_training')->nullable();

            $table->float('basic_sal')->default(0);
            $table->float('epf_cost')->default(0);
            $table->float('etf_cost')->default(0);
            $table->float('allowance_cost')->default(0);
            $table->float('gratuity_cost')->default(0);
            $table->float('other_cost')->default(0);
            $table->float('cost')->default(0);
            $table->float('hr_rates')->default(0);
            $table->float('hr_billing_rates')->default(0);


            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
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
        Schema::dropIfExists('users');
    }
}
