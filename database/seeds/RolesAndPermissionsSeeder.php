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

        $role_super_admin = Role::create(['name' => 'super-admin']);
        $role_staff = Role::create(['name' => 'staff']);
        $role_admin = Role::create(['name' => 'admin']);

        $permission = Permission::create(['name' => 'default']);
        $role_super_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission);
        $role_staff->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Settings']);
        $role_super_admin->givePermissionTo($permission);

        $user = \App\Models\User::where('email','admin@test.com')->first();
        $user->assignRole('super-admin');
    }
}
