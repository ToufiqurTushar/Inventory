<?php

namespace Database\Seeders;

use App\Models\User;
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

        // updateOrCreate default permissions
        Permission::updateOrCreate(['name' => 'list foodentries']);
        Permission::updateOrCreate(['name' => 'view foodentries']);
        Permission::updateOrCreate(['name' => 'updateOrCreate foodentries']);
        Permission::updateOrCreate(['name' => 'update foodentries']);
        Permission::updateOrCreate(['name' => 'delete foodentries']);

        Permission::updateOrCreate(['name' => 'list foodorders']);
        Permission::updateOrCreate(['name' => 'view foodorders']);
        Permission::updateOrCreate(['name' => 'updateOrCreate foodorders']);
        Permission::updateOrCreate(['name' => 'update foodorders']);
        Permission::updateOrCreate(['name' => 'delete foodorders']);

        Permission::updateOrCreate(['name' => 'list members']);
        Permission::updateOrCreate(['name' => 'view members']);
        Permission::updateOrCreate(['name' => 'updateOrCreate members']);
        Permission::updateOrCreate(['name' => 'update members']);
        Permission::updateOrCreate(['name' => 'delete members']);

        Permission::updateOrCreate(['name' => 'list membershiptypes']);
        Permission::updateOrCreate(['name' => 'view membershiptypes']);
        Permission::updateOrCreate(['name' => 'updateOrCreate membershiptypes']);
        Permission::updateOrCreate(['name' => 'update membershiptypes']);
        Permission::updateOrCreate(['name' => 'delete membershiptypes']);

        Permission::updateOrCreate(['name' => 'list stocksin']);
        Permission::updateOrCreate(['name' => 'view stocksin']);
        Permission::updateOrCreate(['name' => 'updateOrCreate stocksin']);
        Permission::updateOrCreate(['name' => 'update stocksin']);
        Permission::updateOrCreate(['name' => 'delete stocksin']);

        Permission::updateOrCreate(['name' => 'list paymenttypes']);
        Permission::updateOrCreate(['name' => 'view paymenttypes']);
        Permission::updateOrCreate(['name' => 'updateOrCreate paymenttypes']);
        Permission::updateOrCreate(['name' => 'update paymenttypes']);
        Permission::updateOrCreate(['name' => 'delete paymenttypes']);

        // updateOrCreate user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::updateOrCreate(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // updateOrCreate admin exclusive permissions
        Permission::updateOrCreate(['name' => 'list roles']);
        Permission::updateOrCreate(['name' => 'view roles']);
        Permission::updateOrCreate(['name' => 'updateOrCreate roles']);
        Permission::updateOrCreate(['name' => 'update roles']);
        Permission::updateOrCreate(['name' => 'delete roles']);

        Permission::updateOrCreate(['name' => 'list permissions']);
        Permission::updateOrCreate(['name' => 'view permissions']);
        Permission::updateOrCreate(['name' => 'updateOrCreate permissions']);
        Permission::updateOrCreate(['name' => 'update permissions']);
        Permission::updateOrCreate(['name' => 'delete permissions']);

        Permission::updateOrCreate(['name' => 'list users']);
        Permission::updateOrCreate(['name' => 'view users']);
        Permission::updateOrCreate(['name' => 'updateOrCreate users']);
        Permission::updateOrCreate(['name' => 'update users']);
        Permission::updateOrCreate(['name' => 'delete users']);

        // updateOrCreate admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::updateOrCreate(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = User::find(1);

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
