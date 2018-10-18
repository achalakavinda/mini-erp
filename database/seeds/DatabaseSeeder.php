<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('designations')->insert([
            [
                'designationType' => "CEO",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'designationType' => "Manager",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'designationType' => "Auditor",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'designationType' => "Clark",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ]

        ]);

        //seed job types
        DB::table('job_types')->insert([
            [
                'JobType'=>"External Auditor",
                "description"=>"des",
                "created_at"=> \Carbon\Carbon::now(),
                "updated_at"=> \Carbon\Carbon::now()
            ],
            [
                'JobType'=>"Internal Auditor",
                "description"=>"desc",
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'JobType'=>"Feasibility",
                "description"=>"desc",
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ]
        ]);

        //seed customer
        DB::table('customers')->insert([
            [
                'name'=>'Richard Peris Lk',
                'contact'=>'077 3584571',
                'email'=>'test@1.com',
                'description'=>'customer description'
            ],
            [
                'name'=>'9X Labs',
                'contact'=>'077 3584572',
                'email'=>'test@2.com',
                'description'=>'customer description'
            ],
            [
                'name'=>'Sysco Labs',
                'contact'=>'077 3584573',
                'email'=>'test@3.com',
                'description'=>'customer description'
            ],
            [
                'name'=>'IFS R&D',
                'contact'=>'077 3584574',
                'email'=>'test@4.com',
                'description'=>'customer description'
            ]
        ]);

    }
}
