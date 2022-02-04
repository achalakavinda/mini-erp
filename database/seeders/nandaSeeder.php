<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class nandaSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_details')->insert([
            [
                'company_id'=>1,
                'company_detail_code'=> config('companyDetailType.name'),
                'value'=>'Dress',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'company_id'=>1,
                'company_detail_code'=>config('companyDetailType.address'),
                'value'=>'No 351 Pannipitiya Road, <br/> Thalawathugoda',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],
            [
                'company_id'=>1,
                'company_detail_code'=>config('companyDetailType.contact'),
                'value'=>'001-222-7777',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ],

        ]);

        DB::unprepared(file_get_contents('public/sql/qanda_insert.sql'));

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_inventory_only = Role::create(['name' => 'UserNandDCompany' ]);


        $role_inventory_only->givePermissionTo(config('constant.Permission_Dashboard'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Staff'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Staff_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Staff_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Staff_Update'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Customer'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Customer_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Customer_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Customer_Update'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Profile'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Profile_Update'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Inventory_Module'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Brand'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Brand_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Brand_Show'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Brand_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Brand_Update'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Color'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Color_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Color_Show'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Color_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Color_Update'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Size'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Size_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Size_Show'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Size_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Size_Update'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Item'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Item_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Item_Show'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Item_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Item_Update'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Stock'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Stock_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Stock_Show'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Stock_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Stock_Update'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Grn'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Grn_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Grn_Show'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Grn_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Grn_Update'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Grn_Post_To_Stock'));

        $role_inventory_only->givePermissionTo(config('constant.Permission_Invoice'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Invoice_Registry'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Invoice_Show'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Invoice_Creation'));
        $role_inventory_only->givePermissionTo(config('constant.Permission_Invoice_Update'));

        $role_inventory_only->save();



    }
}
