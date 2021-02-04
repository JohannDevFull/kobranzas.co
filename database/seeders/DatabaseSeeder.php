<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(BuildingsSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(ClientsSeeder::class);
        $this->call(TypesMovementSeeder::class);
        $this->call(DescriptionMovementsSeeder::class);
        $this->call(SystemSeeder::class);

        
    }
}
 