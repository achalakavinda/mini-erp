<?php

use Illuminate\Database\Seeder;
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
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'admin']);

        $user = \App\Models\User::where('email','admin@test.com')->first();
        $user->assignRole('super-admin');

    }
}
