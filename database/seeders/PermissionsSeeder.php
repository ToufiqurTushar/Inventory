<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list customers']);
        Permission::create(['name' => 'view customers']);
        Permission::create(['name' => 'create customers']);
        Permission::create(['name' => 'update customers']);
        Permission::create(['name' => 'delete customers']);

        Permission::create(['name' => 'list foodentries']);
        Permission::create(['name' => 'view foodentries']);
        Permission::create(['name' => 'create foodentries']);
        Permission::create(['name' => 'update foodentries']);
        Permission::create(['name' => 'delete foodentries']);

        Permission::create(['name' => 'list foodorders']);
        Permission::create(['name' => 'view foodorders']);
        Permission::create(['name' => 'create foodorders']);
        Permission::create(['name' => 'update foodorders']);
        Permission::create(['name' => 'delete foodorders']);

        Permission::create(['name' => 'list members']);
        Permission::create(['name' => 'view members']);
        Permission::create(['name' => 'create members']);
        Permission::create(['name' => 'update members']);
        Permission::create(['name' => 'delete members']);

        Permission::create(['name' => 'list membertypes']);
        Permission::create(['name' => 'view membertypes']);
        Permission::create(['name' => 'create membertypes']);
        Permission::create(['name' => 'update membertypes']);
        Permission::create(['name' => 'delete membertypes']);

        Permission::create(['name' => 'list stocksin']);
        Permission::create(['name' => 'view stocksin']);
        Permission::create(['name' => 'create stocksin']);
        Permission::create(['name' => 'update stocksin']);
        Permission::create(['name' => 'delete stocksin']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
