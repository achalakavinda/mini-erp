<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
       DB::table('customers')->insert([
            [
                'id'=>1,
                'name'=>'Company 01',
                'code'=>'Company-0001',
                'contact'=>'0771777777',
                'email'=>'company1@test.com',
                'secretary_id'=>1,
                'service_id'=>1,
                'sector_id'=>1,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name'=>'Company 02',
                'code'=>'Company-0002',
                'contact'=>'0772777777',
                'email'=>'company2@test.com',
                'secretary_id'=>1,
                'service_id'=>1,
                'sector_id'=>1,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'name'=>'Company 03',
                'code'=>'Company-0003',
                'contact'=>'0773777777',
                'email'=>'company3@test.com',
                'secretary_id'=>1,
                'service_id'=>1,
                'sector_id'=>1,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ]

            ]);

    }
}
