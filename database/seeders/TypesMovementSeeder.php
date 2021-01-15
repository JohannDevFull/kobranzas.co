<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nombre=['CARGUE','ABONO'];
        $naturaleza=['DEBITO','CREDITO'];
    	$tamano=sizeof($nombre );
        for ($i=0; $i < $tamano ; $i++) 
        {  
             
             //
	        DB::table('type_movement')->insert([ 
	            'name_movement' => $nombre[$i],
	            'nature_movement' => $naturaleza[$i],
	        ]);  
        }
    }
}
