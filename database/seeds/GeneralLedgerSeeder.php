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

        DB::table('account_categories')->insert([
            [
                'id'=>1,
                'name'=>'Cost of Sales',
                'code'=>'COS002',
                'main_account_type_id'=>3,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'name'=>'Current Assets',
                'code'=>'CA002',
                'main_account_type_id'=>1,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'name'=>'Current Liabilities',
                'code'=>'CL002',
                'main_account_type_id'=>5,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'name'=>'Non-Current Assets',
                'code'=>'NCA002',
                'main_account_type_id'=>1,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>5,
                'name'=>'Other Income',
                'code'=>'OI002',
                'main_account_type_id'=>4,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>6,
                'name'=>'Owners Equity',
                'code'=>'OE002',
                'main_account_type_id'=>2,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],

        ]);

        DB::table('account_types')->insert([
            [
                'id'=>1,
                'name'=>'Cash and Bank',
                'code'=>'CAB003',
                'account_category_id'=>1,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ]
        ]);

        DB::table('accounts')->insert([
            [
                'id'=>1,
                'name'=>'Sales',
                'code'=>'SALES',
                'account_type_id'=>1,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],

            [
                'id'=>2,
                'name'=>'Product',
                'code'=>'Product',
                'account_type_id'=>1,
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],

        ]);


    }
}
