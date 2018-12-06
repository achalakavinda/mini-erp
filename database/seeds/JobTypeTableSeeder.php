<?php

use Illuminate\Database\Seeder;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
