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

        DB::table('account_types')->insert([
            [
                'id'=>1,
                'name'=>'Cost of Sales',
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
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'name'=>'Expenses',
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>5,
                'name'=>'Non-Current Assets',
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>6,
                'name'=>'Other Income',
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>7,
                'name'=>'Owners Equity',
                'description'=>null,
                'company_id'=>1,
                'company_division_id'=>1,
                'active'=>true,
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],

        ]);

        DB::table('account_entries')->insert([
            [
                'id'=>1,
                'account_type_id'=>1,
                'name'=>'Accrued Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>2,
                'account_type_id'=>1,
                'name'=>'Accum. Depreciation - Buildings',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>3,
                'account_type_id'=>1,
                'name'=>'Accum. Depreciation - Equipments',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>4,
                'account_type_id'=>1,
                'name'=>'Accum. Depreciation - Furniture',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>5,
                'account_type_id'=>1,
                'name'=>'Advertising',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>6,
                'account_type_id'=>1,
                'name'=>'Bank Account 1',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>7,
                'account_type_id'=>1,
                'name'=>'Bank Charges',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>8,
                'account_type_id'=>1,
                'name'=>'Buildings',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>9,
                'account_type_id'=>1,
                'name'=>'Capital',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>10,
                'account_type_id'=>1,
                'name'=>'Cash On Hand',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>11,
                'account_type_id'=>1,
                'name'=>'Closing Stock - Product',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>12,
                'account_type_id'=>1,
                'name'=>'Computer Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>13,
                'account_type_id'=>1,
                'name'=>'Current Profit & Loss',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>14,
                'account_type_id'=>1,
                'name'=>'Deposits',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>15,
                'account_type_id'=>1,
                'name'=>'Depreciation Expenses - Buildings',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>16,
                'account_type_id'=>1,
                'name'=>'Depreciation Expenses - Equipments',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>17,
                'account_type_id'=>1,
                'name'=>'Depreciation Expenses - Furniture',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>18,
                'account_type_id'=>1,
                'name'=>'Electricity & Water Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>19,
                'account_type_id'=>1,
                'name'=>'Equipments',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>20,
                'account_type_id'=>1,
                'name'=>'Freight Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>21,
                'account_type_id'=>1,
                'name'=>'Furniture & Fixtures',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>22,
                'account_type_id'=>1,
                'name'=>'General Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>23,
                'account_type_id'=>1,
                'name'=>'GST Claimable',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>24,
                'account_type_id'=>1,
                'name'=>'GST Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>25,
                'account_type_id'=>1,
                'name'=>'GST Liability',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>26,
                'account_type_id'=>1,
                'name'=>'Income Tax Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>27,
                'account_type_id'=>1,
                'name'=>'Income Tax Payable',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>28,
                'account_type_id'=>1,
                'name'=>'Insurance Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>29,
                'account_type_id'=>1,
                'name'=>'Interest Income',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>30,
                'account_type_id'=>1,
                'name'=>'Labour Cost',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>31,
                'account_type_id'=>1,
                'name'=>'Office Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>32,
                'account_type_id'=>1,
                'name'=>'Other Income',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>33,
                'account_type_id'=>1,
                'name'=>'Prepaid Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>34,
                'account_type_id'=>1,
                'name'=>'Rental Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>35,
                'account_type_id'=>1,
                'name'=>'Repair & Maintenance',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>36,
                'account_type_id'=>1,
                'name'=>'Sundry Creditor',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>37,
                'account_type_id'=>1,
                'name'=>'Sundry Debtor',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>38,
                'account_type_id'=>1,
                'name'=>'Telephone Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>39,
                'account_type_id'=>1,
                'name'=>'Trade Creditor',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>40,
                'account_type_id'=>1,
                'name'=>'Trade Debtor',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>41,
                'account_type_id'=>1,
                'name'=>'Travelling and Accommodation',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>42,
                'account_type_id'=>1,
                'name'=>'Unallocated Expense',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>43,
                'account_type_id'=>1,
                'name'=>'Unallocated Income',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>44,
                'account_type_id'=>1,
                'name'=>'Wages Expenses',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ],
            [
                'id'=>45,
                'account_type_id'=>1,
                'name'=>'Wages Payable',
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now()
            ]

        ]);
    }
}
