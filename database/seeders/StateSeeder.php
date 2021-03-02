<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$estados=['PAGO ACUERDO','PAGO CUOTA','ACUERDO PAGO','ACUERDO ESCRITO','ACUERDO ROTO','COMPROMISO DE LLAMADA','COMPROMISO DE PAGO','CUENTA DE COBRO','DEMANDADO','DEMANDAR','FORMALIZAR','ILOCALIZADO','NOTIFICACION 2','PAZ Y SALVO','MINIMA CUANTIA','ORDENA SACAR','REDIFERIR','FORMALIZAR PAZ Y SALVO','SIN ESPECIFICAR'];
    	$tamano=sizeof($estados);
        for ($i=0; $i < $tamano ; $i++) 
        {  
             
             //
	        DB::table('state')->insert([ 
	            'description' => $estados[$i],
	        ]);  
        }
    }
}
