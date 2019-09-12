<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'id'=>1,
                'name' => 'Master',
                'code' => 'Master',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ]
        ]);

        DB::table('company_divisions')->insert([
            [
                'id'=>1,
                'code' => 'AAA0001',
                'name' => 'Master - Division',
                'company_id'=>1,
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ]
        ]);
    }
}
