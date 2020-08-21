<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Always add new seed on bottom
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_admin = Role::create(['name' => config('constant.ROLE_SUPER_ADMIN') ]);
        $role_staff = Role::create(['name' => config('constant.ROLE_SUPER_STAFF') ]);
        $role_inventory = Role::create(['name' => 'INVENTORY ONLY' ]);


        //permission default
        $permission = Permission::create(['name' => config('constant.Permission_Dashboard')]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Project')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Registry')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Creation')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Budget')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Budget_Creation')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Budget_Update')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Actual')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Actual_Creation')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Actual_Update')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Setting')]);
        $role_admin->givePermissionTo($permission);

        //work sheet
        $permission = Permission::create(['name' => config('constant.Permission_Work_Sheet')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Work_Sheet_Update')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Work_Sheet_Update_2_Day_Back')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Work_Sheet_Update_All_Day_Back')]);
        $role_admin->givePermissionTo($permission);


        $permission = Permission::create(['name' => config('constant.Permission_Minor_Staff_Work_Sheet') ]);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Minor_Staff_Work_Sheet_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Minor_Staff') ]);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Staff') ]);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Staff_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Staff_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Staff_Update') ]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' =>  config('constant.Permission_Designation') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' =>  config('constant.Permission_Designation_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' =>  config('constant.Permission_Designation_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' =>  config('constant.Permission_Designation_Update') ]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Job_Type') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Job_Type_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Job_Type_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Job_Type_Update') ]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Customer') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Customer_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Customer_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Customer_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Profile') ]);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Profile_Update') ]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Setting') ]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Holidays') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Holidays_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Holidays_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Holidays_Update') ]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Attendance') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Attendance_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Attendance_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Attendance_Update') ]);
        $role_admin->givePermissionTo($permission);


        //Please Add New seeds always from end
        //P2 New Assigned Permission Types Seeder
        $permission = Permission::create(['name' => config('constant.Permission_Project_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Registry_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Creation_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Budget_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Budget_Creation_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Budget_Update_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Actual_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Actual_Creation_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Actual_Update_Assigned')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Setting_Assigned')]);
        $role_admin->givePermissionTo($permission);
        //P2 End

        /**
         * Change 1
         * Add new Permission type for all as show
         * this use to view show page
         * Replace default registry ACl from this
         */


        $permission = Permission::create(['name' => config('constant.Permission_Project_Show')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Registry_Assigned_Show')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Designation_Show')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Job_Type_Show')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Customer_Show')]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Holidays_Show')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Attendance_Show')]);
        $role_admin->givePermissionTo($permission);


        $permission = Permission::create(['name' => config('constant.Permission_Project_Staff')]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Project_Staff_Assigned')]);
        $role_admin->givePermissionTo($permission);

        //Inventory permissions
        $permission = Permission::create(['name' => config('constant.Permission_Inventory_Module') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Supplier') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Supplier_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Supplier_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Supplier_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Supplier_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Brand') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Brand_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Brand_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Brand_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Brand_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Category') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Category_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Category_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Category_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Category_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Color') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Color_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Color_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Color_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Color_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Size') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Size_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Size_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Size_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Size_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Item') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Item_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Item_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Item_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Item_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Stock') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Stock_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Stock_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Stock_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Stock_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);


        //accounting
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Requisition') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Requisition_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Requisition_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Requisition_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Requisition_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Requisition_Post_To_PO') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Order') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Order_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Order_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Order_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Order_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Company_Purchase_Post_To_Grn') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Grn') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Grn_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Grn_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Grn_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Grn_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Grn_Post_To_Stock') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Quotation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Quotation_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Quotation_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Quotation_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Quotation_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Quotation_Post_To_Sales_Order') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Quotation_Post_To_Invoice') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Sales_Order') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Sales_Order_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Sales_Order_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Sales_Order_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Sales_Order_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Sales_Order_Post_To_Invoice') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Invoice') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Invoice_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Invoice_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Invoice_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Invoice_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Payment') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Payment_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Payment_Show') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Payment_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Payment_Update') ]);
        $role_admin->givePermissionTo($permission);
        $role_inventory->givePermissionTo($permission);




        $user = \App\Models\User::where('email','admin@test.com')->first();
        $user->assignRole( config('constant.ROLE_SUPER_ADMIN') );

        $user = \App\Models\User::where('email','systemadmin@test.com')->first();
        $user->assignRole( config('constant.ROLE_SUPER_ADMIN') );
    }
}
