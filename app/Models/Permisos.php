<?php

namespace App\Models;

use App\Models\Buildings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\response;
use Illuminate\Support\Facades\DB;

class Permisos extends Model
{
    use HasFactory;
 
    public function rolPermisos($idrol) 
    {
        $rol=$idrol;
        $arregloRP;

        $aRol=DB::select('SELECT permission_id FROM role_has_permissions WHERE role_id='.$rol);
        $aPermiso=DB::select('SELECT id,name FROM permissions');
        
        $tam=sizeof($aRol);
        $tamP=sizeof($aPermiso); 
        for ($k=0; $k < $tamP ; $k++) 
        {  
            aaa:
            if ($k==$tamP)
            {
                goto bbb;
            }
            else
            {               
                $idpermiso=$aPermiso[$k]->id;
            }
            
            for($i=0; $i < $tam ; $i++)
            {
                $pr=$aRol[$i]->permission_id; 
                if($idpermiso==$pr)
                {  
                     $arregloRP[$k]['id'] = $aPermiso[$k]->id;
                     $arregloRP[$k]['check'] ="true";
                     $arregloRP[$k]['name'] = $aPermiso[$k]->name;
                     $k++;
                     goto aaa;
                }
                else 
                {             
                     $arregloRP[$k]['id'] = $idpermiso;
                     $arregloRP[$k]['check'] ="false";
                     $arregloRP[$k]['name'] = $aPermiso[$k]->name;
                }
            } 
        }
        bbb:
        return $arregloRP;
    }

    public static function extracto($id) 
    {
        $arregloRP;
        $total_deuda;

        $movimientos=DB::select('SELECT id_movement,created_at,type_movement_id,description_movement,valor_movement FROM movements  WHERE user_id='.$id);
        $tipo_movimiento=DB::select('SELECT * FROM type_movement ');

        $debito=$tipo_movimiento[0]->name_movement;
        $credito=$tipo_movimiento[1]->name_movement;
         
        
        $tamano=sizeof($movimientos);

        for ($k=0; $k < $tamano ; $k++) 
        {  

                if($movimientos[$k]->type_movement_id==1)
                {  
                    if ($k==0) {
                        $total_deuda=$movimientos[$k]->valor_movement;
                    }else{
                        $total_deuda=$total_deuda+$movimientos[$k]->valor_movement;
                    }

                     $arregloRP[$k]['id_movement'] = $movimientos[$k]->id_movement;
                     $arregloRP[$k]['created_at'] =$movimientos[$k]->created_at;
                     $arregloRP[$k]['type_movement_id'] = $debito;
                     $arregloRP[$k]['description_movement'] = $movimientos[$k]->description_movement;
                     $arregloRP[$k]['valor_cargue'] = $movimientos[$k]->valor_movement;
                     $arregloRP[$k]['valor_abono'] = ""; 
                     $arregloRP[$k]['total_deuda'] = $total_deuda; 
                     
                }
                else 
                {    
                     
                    $total_deuda=$total_deuda-$movimientos[$k]->valor_movement;
                    

                     $arregloRP[$k]['id_movement'] = $movimientos[$k]->id_movement;
                     $arregloRP[$k]['created_at'] =$movimientos[$k]->created_at;
                     $arregloRP[$k]['type_movement_id'] = $credito;
                     $arregloRP[$k]['description_movement'] = $movimientos[$k]->description_movement;
                     $arregloRP[$k]['valor_cargue'] = "";
                     $arregloRP[$k]['valor_abono'] = $movimientos[$k]->valor_movement; 
                     $arregloRP[$k]['total_deuda'] = $total_deuda; 
                }
            
        }

        return $arregloRP;
    }

    public static function reporte($id='')
    {

        $arregloRP;
        $all;
        $conj = Buildings::where('id_building', $id)->get();
        $porcentaje=$conj[0]->gastos_cobranzas;
        $sta = DB::table('state')->get();
        $clients = DB::select("SELECT id,name,email,client_code,contract_number,state_id, state.description as 'estado',user_id,building_id,description,clients.updated_at as 'fecha'
            FROM clients 
            INNER JOIN state
            on state.id_state=clients.state_id
            INNER JOIN users
            on users.id=clients.user_id
            WHERE  building_id=".$id);

        $tam=sizeof($clients);

        for($i=0; $i < $tam ; $i++)
        {
            

            switch ($clients[$i]->state_id) 
            {
                case '1':

                    $idp=$clients[$i]->id;

                    $valor_pago = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Pago acuerdo' LIMIT 1");
                    $gc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Gastos cobranzas' LIMIT 1");
                    $igc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='IVA' LIMIT 1");

                    $debito = DB::select("SELECT SUM(valor_movement) AS 'debito' FROM movements 
                                WHERE  type_movement_id=1 AND `user_id`=" . $idp);
                    $credito = DB::select("SELECT SUM(valor_movement) AS 'credito' FROM movements 
                                        WHERE  type_movement_id=2 AND `user_id`=" . $idp);
                    $cuenta = $debito[0]->debito - $credito[0]->credito;

                    $honorarios=$gc[0]->valor_movement+$igc[0]->valor_movement;
                    $val=$valor_pago[0]->valor_movement;
                    $gastos=($val*$porcentaje)/100;
                    $iva=($gastos*19)/100;
                    $fecha=$valor_pago[0]->date;

                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] = $honorarios;
                    $arregloRP[$i]['fecha_pago'] = $fecha;
                    $arregloRP[$i]['valor_pago'] = $val;
                    $arregloRP[$i]['gastos_cobranzas'] = $gastos;
                    $arregloRP[$i]['iva'] = $iva;
                    $arregloRP[$i]['total_cobranzas'] = $gastos;
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $cuenta;
                break;

                case '52':
                    $idp=$clients[$i]->id;

                    $valor_pago = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Pago cuota' ORDER BY id_movement DESC LIMIT 1");
                    $gc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Gastos cobranzas' LIMIT 1");
                    $igc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='IVA' LIMIT 1");
                    $debito = DB::select("SELECT SUM(valor_movement) AS 'debito' FROM movements 
                                WHERE  type_movement_id=1 AND `user_id`=" . $idp);
                    $credito = DB::select("SELECT SUM(valor_movement) AS 'credito' FROM movements 
                                        WHERE  type_movement_id=2 AND `user_id`=" . $idp);
                    $cuenta = $debito[0]->debito - $credito[0]->credito;
                    $honorarios=$gc[0]->valor_movement+$igc[0]->valor_movement;
                    $val=$valor_pago[0]->valor_movement;
                    $fecha=$valor_pago[0]->date;

                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] = $honorarios;
                    $arregloRP[$i]['fecha_pago'] = $fecha;
                    $arregloRP[$i]['valor_pago'] = $val;
                    $arregloRP[$i]['gastos_cobranzas'] = $gc[0]->valor_movement;
                    $arregloRP[$i]['iva'] = $igc[0]->valor_movement;
                    $arregloRP[$i]['total_cobranzas'] = $honorarios;
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $cuenta;
                break;
                
                default:
                    $idp=$clients[$i]->id;

                    $gc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Gastos cobranzas' LIMIT 1");
                    $igc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='IVA' LIMIT 1");
                    
                    $honorarios=$gc[0]->valor_movement+$igc[0]->valor_movement;

                    $debito = DB::select("SELECT SUM(valor_movement) AS 'debito' FROM movements 
                                WHERE  type_movement_id=1 AND `user_id`=" . $idp);
                    $credito = DB::select("SELECT SUM(valor_movement) AS 'credito' FROM movements 
                                        WHERE  type_movement_id=2 AND `user_id`=" . $idp);
                    $cuenta = $debito[0]->debito - $credito[0]->credito;

                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] =$honorarios;
                    $arregloRP[$i]['fecha_pago'] = $clients[$i]->fecha;
                    $arregloRP[$i]['valor_pago'] = '0';
                    $arregloRP[$i]['gastos_cobranzas'] = '0';
                    $arregloRP[$i]['iva'] = '0';
                    $arregloRP[$i]['total_cobranzas'] = '0';
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $cuenta;
                break;
            }
            
            
        } 

        return $arregloRP;
        
    }

    public function FunctionName($value='')
    {

        $arregloRP;
        $all;
        $conj = Buildings::where('id_building', $id)->get();
        $porcentaje=$conj[0]->gastos_cobranzas;
        $sta = DB::table('state')->get();
        $clients = DB::select("SELECT id,name,email,client_code,contract_number,state_id, state.description as 'estado',user_id,building_id,description,clients.updated_at as 'fecha'
            FROM clients 
            INNER JOIN state
            on state.id_state=clients.state_id
            INNER JOIN users
            on users.id=clients.user_id
            WHERE  building_id=".$id);

        $tam=sizeof($clients);

        for($i=0; $i < $tam ; $i++)
        {
            

            switch ($clients[$i]->state_id) 
            {
                case '1':

                    $idp=$clients[$i]->id;

                    $valor_pago = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Pago acuerdo' LIMIT 1");
                    $gc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Gastos cobranzas' LIMIT 1");
                    $igc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='IVA' LIMIT 1");

                    $debito = DB::select("SELECT SUM(valor_movement) AS 'debito' FROM movements 
                                WHERE  type_movement_id=1 AND `user_id`=" . $idp);
                    $credito = DB::select("SELECT SUM(valor_movement) AS 'credito' FROM movements 
                                        WHERE  type_movement_id=2 AND `user_id`=" . $idp);
                    $cuenta = $debito[0]->debito - $credito[0]->credito;

                    $honorarios=$gc[0]->valor_movement+$igc[0]->valor_movement;
                    $val=$valor_pago[0]->valor_movement;
                    $gastos=($val*$porcentaje)/100;
                    $iva=($gastos*19)/100;
                    $fecha=$valor_pago[0]->date;

                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] = $honorarios;
                    $arregloRP[$i]['fecha_pago'] = $fecha;
                    $arregloRP[$i]['valor_pago'] = $val;
                    $arregloRP[$i]['gastos_cobranzas'] = $gastos;
                    $arregloRP[$i]['iva'] = $iva;
                    $arregloRP[$i]['total_cobranzas'] = $gastos;
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $cuenta;
                break;

                case '2':
                    $idp=$clients[$i]->id;

                    $valor_pago = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Pago cuota' ORDER BY id_movement DESC LIMIT 1");
                    $gc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='Gastos cobranzas' LIMIT 1");
                    $igc = DB::select("SELECT * FROM movements WHERE  user_id='".$idp."' AND description_movement='IVA' LIMIT 1");
                    $debito = DB::select("SELECT SUM(valor_movement) AS 'debito' FROM movements 
                                WHERE  type_movement_id=1 AND `user_id`=" . $idp);
                    $credito = DB::select("SELECT SUM(valor_movement) AS 'credito' FROM movements 
                                        WHERE  type_movement_id=2 AND `user_id`=" . $idp);
                    $cuenta = $debito[0]->debito - $credito[0]->credito;
                    $honorarios=$gc[0]->valor_movement+$igc[0]->valor_movement;
                    $val=$valor_pago[0]->valor_movement;
                    $fecha=$valor_pago[0]->date;

                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] = $honorarios;
                    $arregloRP[$i]['fecha_pago'] = $fecha;
                    $arregloRP[$i]['valor_pago'] = $val;
                    $arregloRP[$i]['gastos_cobranzas'] = $gc[0]->valor_movement;
                    $arregloRP[$i]['iva'] = $igc[0]->valor_movement;
                    $arregloRP[$i]['total_cobranzas'] = $honorarios;
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $cuenta;
                break;
                
                default:
                    $idp=$clients[$i]->id;
                    $debito = DB::select("SELECT SUM(valor_movement) AS 'debito' FROM movements 
                                WHERE  type_movement_id=1 AND `user_id`=" . $idp);
                    $credito = DB::select("SELECT SUM(valor_movement) AS 'credito' FROM movements 
                                        WHERE  type_movement_id=2 AND `user_id`=" . $idp);
                    $cuenta = $debito[0]->debito - $credito[0]->credito;

                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] =0;
                    $arregloRP[$i]['fecha_pago'] = $clients[$i]->fecha;
                    $arregloRP[$i]['valor_pago'] = 0;
                    $arregloRP[$i]['gastos_cobranzas'] = 0;
                    $arregloRP[$i]['iva'] = 0;
                    $arregloRP[$i]['total_cobranzas'] = 0;
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $cuenta;
                break;
            }
            
            
        } 

      

        return response()->json($arregloRP);
        
    }

    public static function roles($value='')
    {
       $roles=DB::select('SELECT id,name FROM roles');
       echo  json_encode($roles, JSON_FORCE_OBJECT);
    }
}
