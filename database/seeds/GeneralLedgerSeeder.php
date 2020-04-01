<?php

use Illuminate\Database\Seeder;

class GeneralLedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('g_l_codes')->insert([
            [
                'id'=>1,
                'name'=>'Collection',
                'debit'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name'=>'Payment',
                'debit'=>false,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ]]);

        DB::table('journal_codes')->insert([
            [
                'id'=>1,
                'name'=>'Cash',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ]]);
    }
}
