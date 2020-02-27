<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'publish users']);
        Permission::create(['name' => 'unpublish users']);
        Permission::create(['name' => 'import users']);
        Permission::create(['name' => 'export users']);

        Permission::create(['name' => 'view members']);
        Permission::create(['name' => 'edit members']);
        Permission::create(['name' => 'delete members']);
        Permission::create(['name' => 'publish members']);
        Permission::create(['name' => 'unpublish members']);
        Permission::create(['name' => 'import members']);
        Permission::create(['name' => 'export members']);

        Permission::create(['name' => 'edit settings']);
        Permission::create(['name' => 'receive notification']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'viewer']);
        $role->givePermissionTo(['view users', 'view members']);

        // this can be done as separate statements
        $role = Role::create(['name' => 'editor'])
            ->givePermissionTo(['view users', 'view members', 'edit members']);

        // or may be done by chaining
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'view users', 
                'view members', 
                'publish members', 
                'edit members',
                'unpublish members',
                'import members',
                'export members'
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

    }
}
