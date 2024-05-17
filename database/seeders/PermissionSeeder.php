<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
            Permission::create(['name' => 'users', 'display' => 'User Management']); // for parent
            Permission::create(['name' => 'users.create', 'display' => 'Create User']);
            Permission::create(['name' => 'users.update', 'display' => 'Update User']);
            Permission::create(['name' => 'users.delete', 'display' => 'Delete User']); 
            
            Permission::create(['name' => 'roles', 'display' => 'Roles Management']); // for parent
            Permission::create(['name' => 'roles.create', 'display' => 'Create Roles']);
            Permission::create(['name' => 'roles.update', 'display' => 'Update Roles']);
            Permission::create(['name' => 'roles.delete', 'display' => 'Delete Roles']); 
           
            Permission::create(['name' => 'products', 'display' => 'Products Management']); // for parent
            Permission::create(['name' => 'products.create', 'display' => 'Create Products']);
            Permission::create(['name' => 'products.update', 'display' => 'Update Products']);
            Permission::create(['name' => 'products.delete', 'display' => 'Delete Products']); 

        
    }
}
