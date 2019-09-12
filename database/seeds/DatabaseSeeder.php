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
            CompaniesTableSeeder::class,
            Important::class,
            RolesAndPermissionsSeeder::class,
            TestDataSeeder::class,
//            DesignationSeeder::class,
//            JobTypeTableSeeder::class,
//            CustomerSeeder::class,
//            ProjectCostTypeTableSeeder::class,
//            UserTableSeeder::class,
//            ProjectSeeder::class
        ]);


    }
}
