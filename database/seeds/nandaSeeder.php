<?php

use Illuminate\Database\Seeder;

class nandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::unprepared(file_get_contents('public/sql/qanda_insert.sql'));
    }
}
