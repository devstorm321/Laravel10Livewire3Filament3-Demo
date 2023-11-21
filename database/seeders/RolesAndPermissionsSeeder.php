<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'restricted']);
        Permission::create(['name' => 'limited']);
        Permission::create(['name' => 'most restricted']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'Group Level'])
            ->givePermissionTo('restricted');

        $role = Role::create(['name' => 'Brand Level'])
            ->givePermissionTo(['limited']);

        $role = Role::create(['name' => 'Business Level'])
            ->givePermissionTo(['most restricted']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
