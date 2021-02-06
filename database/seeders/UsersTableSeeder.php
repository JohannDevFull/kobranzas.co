<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Johan Reyes',
            'email'=>'jr@jr.com',
            'password'=>bcrypt("123"),
            'phone_one'=>'123456789',
            'phone_two'=>'987654321',
            'doc_type'=>'cedula_ciudadania',
            'document'=>'1020304050'

        ]);
        User::create([
            'name'=>'Cliente Usuario',
            'email'=>'cliene@kobranzas.co',
            'password'=>bcrypt("123"),
            'phone_one'=>'987654321',
            'phone_two'=>'311256464',
            'doc_type'=>'cedula_ciudadania',
            'document'=>'1976546765'

        ]);
        User::create([
            'name'=>'Empleado Usuario',
            'email'=>'empleado@kobranzas.co',
            'password'=>bcrypt("123"),
            'phone_one'=>'922324321',
            'phone_two'=>'311111464',
            'doc_type'=>'cedula_ciudadania',
            'document'=>'13336765'

        ]);
        User::create([
            'name'=>'Administrador Conjunto Usuario',
            'email'=>'administrador@kobranzas.co',
            'password'=>bcrypt("123"),
            'phone_one'=>'9888881',
            'phone_two'=>'37777764',
            'doc_type'=>'cedula_ciudadania',
            'document'=>'19999965'

        ]);

        User::factory(50)->create();

        User::create([
            'name'=>'Administrador Conjunto Cataleya',
            'email'=>'cataleya@kob.co',
            'password'=>bcrypt("123"),
            'phone_one'=>'78658627',
            'phone_two'=>'78675648',
            'doc_type'=>'cedula_ciudadania',
            'document'=>'655575'

        ]);
    }
}
