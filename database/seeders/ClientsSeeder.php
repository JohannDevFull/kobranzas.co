<?php

namespace Database\Seeders;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= User::all(); 

        Clients::create([
                    'client_code'=>random_int($min=1000000000,$max=9999999999),
                    'contract_number'=>random_int($min=1000000000,$max=9999999999),
                    'state_id'=>rand(1,15),
                    'user_id'=>'2',
                    'building_id'=>'1',

        ]); 
        
        $tamano=sizeof($users);
        for ($i=4; $i < $tamano ; $i++) 
        {  

            if ($i<26)
            {
                Clients::create([
                    'client_code'=>random_int($min=1000000000,$max=9999999999),
                    'contract_number'=>random_int($min=1000000000,$max=9999999999),
                    'state_id'=>rand(1,15),
                    'user_id'=>$users[$i]->id,
                    'building_id'=>'1',

                ]);  
                 
            }
            else
            {
                Clients::create([
                    'client_code'=>random_int($min=1000000000,$max=9999999999),
                    'contract_number'=>random_int($min=1000000000,$max=9999999999),
                    'state_id'=>rand(1,15),
                    'user_id'=>$users[$i]->id,
                    'building_id'=>'2',

                ]); 

            }


        }
    }
}
