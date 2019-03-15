<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_admin = Role::create(['name' => config('constant.ROLE_SUPER_ADMIN') ]);
        $role_staff = Role::create(['name' => config('constant.ROLE_SUPER_STAFF') ]);

        //permission default
        $permission = Permission::create(['name' => config('constant.Permission_Dashboard')]);
        $role_admin->givePermissionTo($permission);

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
        $permission = Permission::create(['name' => config('constant.Permission_Customer_Registry') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Customer_Creation') ]);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => config('constant.Permission_Customer_Update') ]);
        $role_admin->givePermissionTo($permission);

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

        $user = \App\Models\User::where('email','admin@test.com')->first();
        $user->assignRole( config('constant.ROLE_SUPER_ADMIN') );
    }
}
