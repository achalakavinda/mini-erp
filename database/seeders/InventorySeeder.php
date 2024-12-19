<?php

use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents('public/sql/insert_inventory_test_data.sql'));
    }
}
