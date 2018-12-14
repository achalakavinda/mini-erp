<?php

use Illuminate\Database\Seeder;

class Important extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Customer important seeds
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

        //Designation important seeds
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

        //Job Type Important seeds
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

        //Project cost important seeds
        DB::table('project_cost_types')->insert([
            [
                'id'=>1,
                'name'=>'Incentives',
                'remarks'=>'remarks',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name'=>'Overtime',
                'remarks'=>'remarks',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'name'=>'Travelling',
                'remarks'=>'remarks',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'name'=>'Administration Overheads',
                'remarks'=>'remarks',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
        ]);

        //staff important seeds
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
}
