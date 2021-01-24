<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescriptionMovementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $debitos=['Multa','Parqueadero','Salon eventos','Intereses mora'];

        $creditos=['Pago','Ajuste',];

        $nat_deb=1;
        $nat_cre=2;

    	$tamano=sizeof($debitos );

        for ($i=0; $i < $tamano ; $i++) 
        {  
              
             //
	        DB::table('description_movements')->insert([ 
	            'description' => $debitos[$i],
	            'nature_movement' => $nat_deb,
	        ]);  
        }

        $tam=sizeof($creditos);

        for ($k=0; $k < $tam ; $k++) 
        {  
             
            //
	        DB::table('description_movements')->insert([ 
	            'description' => $creditos[$k],
	            'nature_movement' => $nat_cre,
	        ]);  
        }
    }
}
