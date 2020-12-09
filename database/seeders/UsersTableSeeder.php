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
            'password'=>bcrypt(123),
            'phone_one'=>'123456789',
            'phone_two'=>'987654321',
            'doc_type'=>'cedula_ciudadania',
            'document'=>'1020304050'

        ]);
        User::create([
            'name'=>'Johann Ramirez',
            'email'=>'admin@kobranzas.co',
            'password'=>bcrypt(123),
            'phone_one'=>'987654321',
            'phone_two'=>'311256464',
            'doc_type'=>'cedula_ciudadania',
            'document'=>'1976546765'

        ]);

        //User::factory(15)->create();
    
    }
}
