<?php

use Illuminate\Database\Seeder;

class ProjectCostTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
