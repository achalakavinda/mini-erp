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

        $role_admin = Role::create(['name' => 'Admin']);
        $role_partner = Role::create(['name' => 'Partner']);
        $role_manager = Role::create(['name' => 'Manager']);
        $role_associate_manager = Role::create(['name' => 'Associate Manager']);
        $role_hr = Role::create(['name' => 'HR']);
        $role_staff = Role::create(['name' => 'Staff']);

        //permission default
        $permission = Permission::create(['name' => 'Dashboard']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Project']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Registry']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Creation']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Budget']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Budget | Creation']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Budget | Update']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Actual']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Actual | Creation']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Actual | Update']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Project | Setting']);
        $role_admin->givePermissionTo($permission);

        //work sheet
        $permission = Permission::create(['name' => 'Work Sheet']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Work Sheet | Update']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Work Report']);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Work Report | Update']);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Minor Staff']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Staff']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Staff | Registry']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Staff | Creation']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Staff | Update']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Designation']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Designation | Registry']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Designation | Creation']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Designation | Update']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Job Type']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Job Type | Registry']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Job Type | Creation']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Job Type | Update']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Customer']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Customer | Registry']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Customer | Creation']);
        $role_admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Customer | Update']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Profile']);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'Profile | Update']);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Settings']);
        $role_admin->givePermissionTo($permission);

        $user = \App\Models\User::where('email','admin@test.com')->first();
        $user->assignRole('Admin');
    }
}
