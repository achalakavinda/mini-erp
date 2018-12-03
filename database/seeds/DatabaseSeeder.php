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
                'id'=>1,
                'designationType' => "Partner",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'designationType' => "Director",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'designationType' => "Senior Manager",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'designationType' => "Manager",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>5,
                'designationType' => "Assistant Manager",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>6,
                'designationType' => "Senior Executive",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>7,
                'designationType' => "Executive",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>8,
                'designationType' => "Senior Audit Associate",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>9,
                'designationType' => "Accounts Associates (BPS)",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>10,
                'designationType' => "Audit Associate 1",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>11,
                'designationType' => "Audit Associate 2",
                'description' => str_random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],

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

        //seed customer secretaries
        DB::table('customer_secretaries')->insert([
            [
                'id'=>1,
                'name'=>'KCS',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name'=>'Em En Es(Assignments)(PVT)Ltd.',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'name'=>'Other',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],

        ]);

        //seed customer secretaries
        DB::table('customer_services')->insert([
            [
                'name'=>'External Audit',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Tax Compliance',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'BPO',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Company Secretarial',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Internal Audit',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Winidng Up',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Advisory',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Other',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
        ]);
        DB::table('customer_sectors')->insert([
            [
                'name'=>'Agriculture, Fishing & Forestry',
                'code'=>'A',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Construction',
                'code'=>'C',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Manufacturing',
                'code'=>'M',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Transport and Communication',
                'code'=>'T',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Wholesale',
                'code'=>'W',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Retail',
                'code'=>'R',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Finance, Insurance & Real Estate',
                'code'=>'F',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Healthcare & Medical',
                'code'=>'H',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Leisure, Hospitality & Travel',
                'code'=>'L',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Education',
                'code'=>'E',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Services',
                'code'=>'S',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Not for Profit / Charitable  Organizations',
                'code'=>'N',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Other Sectors ',
                'code'=>'O',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Individuals / Not applicable',
                'code'=>'I',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],

        ]);

        DB::table('work_codes')->insert([
            [
                'id'=>1,
                'name'=>'Work',
                'from' => '08:00:00',
                'to'=>'17:30:00',
                'worked'=>1
            ],
            [
                'id'=>2,
                'name'=>'Leave Full Day',
                'from' => '08:00:00',
                'to'=>'17:30:00',
                'worked'=>0
            ],
            [
                'id'=>4,
                'name'=>'Leave Half Day',
                'from' => '08:00:00',
                'to'=>'12:30:00',
                'worked'=>0
            ],
        ]);

    }
}
