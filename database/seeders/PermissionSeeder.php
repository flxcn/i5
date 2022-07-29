<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create clients']);
        Permission::create(['name' => 'edit clients']);
        Permission::create(['name' => 'delete clients']);

        Permission::create(['name' => 'create contacts']);
        Permission::create(['name' => 'edit contacts']);
        Permission::create(['name' => 'delete contacts']);

        Permission::create(['name' => 'manage users']);

        

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Comper']);
        $role1->givePermissionTo('create clients');
        $role1->givePermissionTo('edit clients');
        $role1->givePermissionTo('create contacts');
        $role1->givePermissionTo('edit contacts');

        $role2 = Role::create(['name' => 'Volunteer']);
        $role2->givePermissionTo('create clients');
        $role2->givePermissionTo('edit clients');
        $role2->givePermissionTo('delete clients');
        $role2->givePermissionTo('create contacts');
        $role2->givePermissionTo('edit contacts');
        $role2->givePermissionTo('delete contacts');

        $role3 = Role::create(['name' => 'Director']);
        $role3->givePermissionTo('create clients');
        $role3->givePermissionTo('edit clients');
        $role3->givePermissionTo('delete clients');
        $role3->givePermissionTo('create contacts');
        $role3->givePermissionTo('edit contacts');
        $role3->givePermissionTo('delete contacts');
        $role3->givePermissionTo('manage users');
        
        $role4 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
    }
}
