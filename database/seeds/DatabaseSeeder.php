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

        $this->call([
            DesignationSeeder::class,
            JobTypeTableSeeder::class,
            CustomerSeeder::class,
            ProjectCostTypeTableSeeder::class
        ]);


    }
}
