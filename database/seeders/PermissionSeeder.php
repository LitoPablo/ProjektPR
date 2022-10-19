<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        // Permission::create(['name' => 'users.index']);
        // Permission::create(['name' => 'users.store']);
        // Permission::create(['name' => 'users.destroy']);
        // Permission::create(['name' => 'users.change_role']);

        // $userRole = Role::findByName(config('permission.admin_role'));
        // $userRole->givePermissionTo('users.index');
        // $userRole->givePermissionTo('users.store');
        // $userRole->givePermissionTo('users.destroy');
        // $userRole->givePermissionTo('users.change_role');
    }
}