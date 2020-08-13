<?php

use Illuminate\Database\Seeder;

class RequisitionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchase_requisition_status')->insert([
            [
                'id'=>1,
                'name'=>'Pending'
            ],
            [
                'id'=>2,
                'name'=>'Posted to Purchase Orders'
            ],
            [
                'id'=>3,
                'name'=>'Posted to GRN'
            ],
           
            ]);
    }
}