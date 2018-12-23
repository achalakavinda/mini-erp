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
        $role_hr = Role::create(['name' => 'HR']);
        Role::create(['name' => 'Staff']);

        $permission = Permission::create(['name' => 'Default']);
        $role_admin->givePermissionTo($permission);
        $role_hr->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Settings']);
        $role_admin->givePermissionTo($permission);

        $user = \App\Models\User::where('email','admin@test.com')->first();
        $user->assignRole('Admin');
    }
}
