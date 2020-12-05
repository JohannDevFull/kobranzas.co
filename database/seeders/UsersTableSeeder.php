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
            'password'=>bcrypt(123)

        ]);
        User::factory(15)->create();
    
    }
}
