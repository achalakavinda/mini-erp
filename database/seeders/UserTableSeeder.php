<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        //admin user seed from user migration
        DB::table('users')->insert([
            [
                'id'=>2,
                'name' => 'User 1',
                'email' => 'user1@test.com',
                'password' => bcrypt('user1'),
                'date_joined'=>\Carbon\Carbon::now(),
                'mobile'=>7717777777,
                'residence'=>'residence',
                'hometown_district_id'=>1,
                'hometown_city'=>'HOMECITY',
                'cmb_location_district'=>1,
                'cmb_city'=>'CMBCITY',
                'address'=>'Address User 1',
                'emp_no'=>'',
                'epf_no'=>'',
                'designation_id'=>'1',//this must consider when creating seed
                'nic'=>null,
                'ca_agree_no'=>null,
                'ca_training_period_from'=>null,
                'ca_training_period_to'=>null,
                'ca_training'=>null,
                'basic_sal'=>50000,
                'epf_cost'=>4500,
                'etf_cost'=>7500,
                'allowance_cost'=>1000,
                'gratuity_cost'=>0,
                'other_cost'=>0,
                'cost'=>63000,//cost divided by 240
                'hr_rates'=>262.5,
                'hr_billing_rates'=>0
            ],
            [
                'id'=>3,
                'name' => 'User 2',
                'email' => 'user2@test.com',
                'password' => bcrypt('user2'),
                'date_joined'=>\Carbon\Carbon::now(),
                'mobile'=>7727777777,
                'residence'=>'residence',
                'hometown_district_id'=>1,
                'hometown_city'=>'HOMECITY',
                'cmb_location_district'=>1,
                'cmb_city'=>'CMBCITY',
                'address'=>'Address User 1',
                'emp_no'=>'',
                'epf_no'=>'',
                'designation_id'=>'1',//this must consider when creating seed
                'nic'=>null,
                'ca_agree_no'=>null,
                'ca_training_period_from'=>null,
                'ca_training_period_to'=>null,
                'ca_training'=>null,
                'basic_sal'=>50000,
                'epf_cost'=>4000,
                'etf_cost'=>7500,
                'allowance_cost'=>1000,
                'gratuity_cost'=>0,
                'other_cost'=>0,
                'cost'=>58000,
                'hr_rates'=>241.66,//cost divided by 240
                'hr_billing_rates'=>0
            ]

        ]);

    }
}
