<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Permission list
         Permission::create(['name' => 'user.index']);
         Permission::create(['name' => 'user.edit']);
         Permission::create(['name' => 'user.show']);
         Permission::create(['name' => 'user.create']);
         Permission::create(['name' => 'user.destroy']);
 
         //Admin
         $admin = Role::create(['name' => 'Admin']);
 
         $admin->givePermissionTo([
             'user.index',
             'user.edit',
             'user.show',
             'user.create',
             'user.destroy'
         ]);

        
         //Guest
         $guest = Role::create(['name' => 'Cliente']);
 
         $guest->givePermissionTo([
             'user.index',
             'user.show'
         ]);
 
         //User Admin
         $user = User::find(1); 
         $user->assignRole('Admin');
    }
}
