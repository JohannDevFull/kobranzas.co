<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('buildings')->insert([
            'name_building' => 'Altos de alameda III',
            'address_building' => 'Calle falsa n 123-27',
            'phone_building' =>'+0315269712',
            'gastos_cobranzas' =>'15',
            'valor_administracion' =>'55000',
            'administrator_id' => '4',
            'created_at' => '2020-12-20 00:11:45', 
            'updated_at' =>'2020-12-20 00:11:45',
        ]);

        $users= User::all();

        $tamano=sizeof($users);

        DB::table('buildings')->insert([
            'name_building' => 'Cataleya',
            'address_building' => 'krr falsa n 321-77',
            'phone_building' =>'+06756777712',
            'gastos_cobranzas' =>'15',
            'valor_administracion' =>'55000',
            'administrator_id' => $tamano,
            'created_at' => '2020-12-20 00:11:45',
            'updated_at' =>'2020-12-20 00:11:45',
        ]);

    }
}
