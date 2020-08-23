<?php

use Illuminate\Database\Seeder;

class CompanyDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('companyDetailType') as $item){
            \App\Models\CompanyDetailType::create([
                'code'=>$item
            ]);
        }
    }
}
