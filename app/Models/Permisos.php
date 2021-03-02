<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public static function informe($id) 
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

    public static function roles($value='')
    {
       $roles=DB::select('SELECT id,name FROM roles');
       echo  json_encode($roles, JSON_FORCE_OBJECT);
    }
}
