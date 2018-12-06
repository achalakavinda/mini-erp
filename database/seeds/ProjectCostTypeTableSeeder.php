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
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name'=>'Overtime',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'name'=>'Travelling',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'name'=>'Administration Overheads',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
        ]);
    }
}
