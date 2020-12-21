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
        Permission::create(['name' => 'chat.index']);
        //Permission Admin 
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.show']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.destroy']);

        Permission::create(['name' => 'perfil.edit']);
        // *****

        //Permission Cliente 
        Permission::create(['name' => 'cliente.index']);
        Permission::create(['name' => 'cliente.edit']);
        Permission::create(['name' => 'cliente.show']);
        // *****

        //Permission Empleado
        Permission::create(['name' => 'empleado.index']);
        Permission::create(['name' => 'empleado.edit']);
        Permission::create(['name' => 'empleado.show']);
        Permission::create(['name' => 'empleado.create']);
        // *****

        //Permission Administrador
        Permission::create(['name' => 'administrador.index']);
        Permission::create(['name' => 'administrador.show']);
        // *****

        //Crear roles
        $admin = Role::create(['name' => 'Admin']);
        $cliente = Role::create(['name' => 'Cliente']);
        $empleado = Role::create(['name' => 'Empleado']);
        $administrador = Role::create(['name' => 'AdminConjunto']);
        // *****


        //Asignar permisos Admin
        $admin->givePermissionTo([
            'user.index',
            'user.edit',
            'user.show',
            'user.create',
            'user.destroy',
            'chat.index'
        ]);
        // *****

        //Asignar permisos Cliente
        $cliente->givePermissionTo([
            'user.index',
            'user.edit',
            'user.show'
        ]);
        // *****

        //Asignar permisos Empleado
        $empleado->givePermissionTo([
            'chat.index',
            'user.index',
            'user.edit',
            'user.show',
            'user.create'
        ]);
        // *****

        //Asignar permisos Administrador
        $administrador->givePermissionTo([
            'chat.index',
            'user.index',
            'user.show'
        ]);
        // *****

        //User Admin
        $user = User::find(1);
        $user->assignRole('Admin');

        //User Cliente
        $user2 = User::find(2);
        $user2->assignRole('Cliente');

        //User Empleado
        $user3 = User::find(3);
        $user3->assignRole('Empleado');

        //User Administrador
        $user4 = User::find(4);
        $user4->assignRole('AdminConjunto');

        $users = User::all();

        $tamano = sizeof($users);
        for ($i = 0; $i < $tamano; $i++) {
            $usuario = User::find($users[$i]->id);
            $usuario->assignRole('Cliente');
        }
    }
}
