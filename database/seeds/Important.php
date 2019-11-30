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
                'name'=>'Individuals / Not applicable',
                'code'=>'I',
                'description'=>'description',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'name'=>'Information & Communication',
                'code'=>'IT',
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
                'avg_hr_rate'=>1000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'designationType' => "Director",
                'avg_hr_rate'=>2000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'designationType' => "Senior Manager",
                'avg_hr_rate'=>900,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'designationType' => "Manager",
                'avg_hr_rate'=>850,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>5,
                'designationType' => "Assistant Manager",
                'avg_hr_rate'=>840,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>6,
                'designationType' => "Senior Executive",
                'avg_hr_rate'=>750,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>7,
                'designationType' => "Executive",
                'avg_hr_rate'=>1750,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>8,
                'designationType' => "Senior Audit Associate",
                'avg_hr_rate'=>650,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>9,
                'designationType' => "Accounts Associates (BPS)",
                'avg_hr_rate'=>650,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>10,
                'designationType' => "Audit Associate 1",
                'avg_hr_rate'=>550,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],
            [
                'id'=>11,
                'designationType' => "Audit Associate 2",
                'avg_hr_rate'=>500,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()
            ],

        ]);

        //Job Type Important seeds
        DB::table('job_types')->insert([
            [
                'JobType'=>"External Audit",
                'key'=>'EA',
                "created_at"=> \Carbon\Carbon::now(),
                "updated_at"=> \Carbon\Carbon::now()
            ],
            [
                'JobType'=>"Internal Audit",
                'key'=>'IA',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'JobType'=>"Feasibility",
                'key'=>'FEA',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'JobType'=>"Other",
                'key'=>'OTHER',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ]
        ]);

        DB::table('project_status')->insert([
                [
                    'id'=>1,
                    'unique_id'=>1,
                    'name'=>'Open',
                    "created_at"=>\Carbon\Carbon::now(),
                    "updated_at"=>\Carbon\Carbon::now()
                ],
                [
                    'id'=>2,
                    'unique_id'=>2,
                    'name'=>'Verified',
                    "created_at"=>\Carbon\Carbon::now(),
                    "updated_at"=>\Carbon\Carbon::now()
                ],
                [
                    'id'=>3,
                    'unique_id'=>3,
                    'name'=>'Close',
                    "created_at"=>\Carbon\Carbon::now(),
                    "updated_at"=>\Carbon\Carbon::now()
                ],
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
            ]
        ]);

        //staff important seeds
        DB::table('ca_trainings')->insert([
            [
                'name' => 'NULL'
            ],
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


        DB::table('day_types')->insert([
            [
                'id'=>1,
                'name'=>'Working Day',
                'workable'=>true,
            ],
            [
                'id'=>2,
                'name'=>'Saturday',
                'workable'=>false,
            ],
            [
                'id'=>3,
                'name'=>'Sunday',
                'workable'=>false,
            ],
            [
                'id'=>4,
                'name'=>'Holiday',
                'workable'=>false,
            ],
            [
                'id'=>5,
                'name'=>'Company Holiday',
                'workable'=>false,
            ],
        ]);


    }
}
