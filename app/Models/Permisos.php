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
}
