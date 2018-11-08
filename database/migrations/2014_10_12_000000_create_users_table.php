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


            $table->date('date_joined')->default(\Carbon\Carbon::now());
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

        DB::table('ca_trainings')->insert([
            [
                'name' => 'EL'
            ],
            [
                'name' => 'BL'
            ],
            [
                'name' => 'CL'
            ]
        ]);

        DB::table('hometown_districts')->insert([
            [
                'name' => 'Ampara'
            ],
            [
                'name' => 'Anuradhapura'
            ],
            [
                'name' => 'Badulla'
            ],
            [
                'name' => 'Batticaloa'
            ],
            [
                'name' => 'Colombo'
            ],
            [
                'name' => 'Galle'
            ],
            [
                'name' => 'Gampaha'
            ],
            [
                'name' => 'Hambantota'
            ],
            [
                'name' => 'Jaffna'
            ],
            [
                'name' => 'Kalutara'
            ],
            [
                'name' => 'Kandy'
            ],
            [
                'name' => 'Kegalle'
            ],
            [
                'name' => 'Kilinochchi'
            ],
            [
                'name' => 'Kurunegala'
            ],
            [
                'name' => 'Mannar'
            ],
            [
                'name' => 'Matale'
            ],
            [
                'name' => 'Matara'
            ],
            [
                'name' => 'Monaragala'
            ],
            [
                'name' => 'Mullaitivu'
            ],
            [
                'name' => 'Nuwara Eliya'
            ],
            [
                'name' => 'Polonnaruwa'
            ],
            [
                'name' => 'Puttalam'
            ],
            [
                'name' => 'Ratnapura'
            ],
            [
                'name' => 'Trincomalee'
            ],
            [
                'name' => 'Vavuniya'
            ]
        ]);

        DB::table('cmb_location_districts')->insert([
            [
                'name' => 'Colombo'
            ],
            [
                'name' => 'Dehiwala'
            ],
            [
                'name' => 'Homagama'
            ],
            [
                'name' => 'Kaduwela'
            ],
            [
                'name' => 'Kesbewa'
            ],
            [
                'name' => 'Kolonnawa'
            ],
            [
                'name' => 'Maharagama'
            ],
            [
                'name' => 'Moratuwa'
            ],
            [
                'name' => 'Padukka'
            ],
            [
                'name' => 'Ratmalana'
            ],
            [
                'name' => 'Seethawaka'
            ],
            [
                'name' => 'Sri Jayawardenepura Kotte'
            ],
            [
                'name' => 'Thimbirigasyaya'
            ],

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
