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
                'id'=>1,
                'name'=>'External Audit',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name'=>'Tax Compliance',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'name'=>'BPO',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'name'=>'Company Secretarial',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>5,
                'name'=>'Internal Audit',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>6,
                'name'=>'Winidng Up',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>7,
                'name'=>'Advisory',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>8,
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

        //seed customer
        DB::table('customers')->insert([
            [
                'name'=>'Richard Peris Lk',
                'code'=>'R P L',
                'contact'=>'077 3584571',
                'email'=>'test@1.com',
                'description'=>'customer description',
                'secretary_id'=>1,
                'service_id'=>1,
                'sector_id'=>3
            ],
            [
                'name'=>'IFS R&D',
                'code'=>'IFS',
                'contact'=>'077 3584574',
                'email'=>'test@4.com',
                'description'=>'customer description',
                'secretary_id'=>1,
                'service_id'=>1,
                'sector_id'=>3
            ]
        ]);

    }
}
