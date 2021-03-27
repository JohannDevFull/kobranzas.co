<?php

namespace App\Http\Controllers;

use App\Models\Buildings;
use App\Models\Calls;
use App\Models\Clients;
use App\Models\Permisos;
use App\Models\Pruebas;
use App\Models\State;
use App\Models\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermisosController extends Controller
{
    /**
     * VISTA PERMISOS
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol=1;
        $roles=DB::select('SELECT * FROM roles');
        $rolPermisos = new Permisos;
        $permisos=$rolPermisos->rolPermisos($rol);

        return Inertia::render('SuperAdmin/IndexPermiso',[
            'roles' => $roles,
            'permisos' => $permisos,
        ]);
    }

    /**
     * VER ROLES Y SUS PERMISOS
     *
     * @return \Illuminate\Http\Response
     */
    public function indexID(Request $request,$rol)
    {
        
        $id=$rol;
        $roles=DB::select('SELECT * FROM roles');
        $rolPermisos = new Permisos;
        $permisos=$rolPermisos->rolPermisos($id);

        return Inertia::render('SuperAdmin/IndexPermiso',[
            'roles' => $roles,
            'permisos' => $permisos,
        ]);
    }

    /**
     * CREAR ROL
     *
     * @return \Illuminate\Http\Response
     */
    public function storeRol(Request $request)
    {
        Role::create(['name' =>$request->name]);
        return Redirect::route('permisos');
    }








    
    /**
     * CREAR PERMISO
     *
     * @return \Illuminate\Http\Response
     */
    public function storePermiso(Request $request)
    {
        Permission::create(['name' =>$request->name]);
        return Redirect::route('permisos');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRol(Request $request, $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePermiso(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function iframe(Request $request,$value='')
    {
           return Inertia::render('SuperAdmin/Iframe');
    }
     public function ventana(Request $request,$value='')
    {
        echo "holaaaas";
           return Inertia::render('SuperAdmin/VentanaLlamada');
    }

    public static function reporte(Request $request,$id='')
    {

        $arregloRP=Permisos::reporte($id);

        return response()->json($arregloRP);
        
    }

    public function test(Request $request,$id='')
    {

     
        $arregloRP;
        $all;
        $clients = DB::select("SELECT id,name,email,client_code,contract_number,state_id,state.description as 'estado',user_id,building_id,description,clients.updated_at as 'fecha'
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


                    $valor_pago = DB::select("SELECT * FROM movements WHERE  `user_id`=".$clients[$i]->id." AND description_movement='Pago acuerdo' LIMIT 1");

                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['fecha_pago'] = $clients[$i]->name;
                    $arregloRP[$i]['valor_pago'] = $clients[$i]->id;
                    $arregloRP[$i]['gastos_cobranzas'] = $clients[$i]->name;
                    $arregloRP[$i]['iva'] = $clients[$i]->name;
                    $arregloRP[$i]['total_cobranzas'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $clients[$i]->name;
                break;

                case '2':
                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['fecha_pago'] = $clients[$i]->name;
                    $arregloRP[$i]['valor_pago'] = $clients[$i]->id;
                    $arregloRP[$i]['gastos_cobranzas'] = $clients[$i]->name;
                    $arregloRP[$i]['iva'] = $clients[$i]->name;
                    $arregloRP[$i]['total_cobranzas'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $clients[$i]->name;
                break;
                
                default:
                    $arregloRP[$i]['codigo'] = $clients[$i]->client_code;
                    $arregloRP[$i]['nombre'] =$clients[$i]->name;
                    $arregloRP[$i]['estado'] =$clients[$i]->estado;
                    $arregloRP[$i]['honorarios'] =0;
                    $arregloRP[$i]['fecha_pago'] = $clients[$i]->fecha;
                    $arregloRP[$i]['valor_pago'] = $clients[$i]->id;
                    $arregloRP[$i]['gastos_cobranzas'] = 0;
                    $arregloRP[$i]['iva'] = 0;
                    $arregloRP[$i]['total_cobranzas'] = 0;
                    $arregloRP[$i]['saldo_honorarios'] = $clients[$i]->name;
                    $arregloRP[$i]['saldo_total'] = $clients[$i]->name;
                break;
            }
            
            
        } 

        
        $fecha_actual = Carbon::now();
        $day = $fecha_actual->format('m');
        print_r($day);
        // return response()->json($arregloRP);
    } 
        
    /**
     * TESTING: VER ROLES Y SUS PERMISOS
     *
     * @return \Illuminate\Http\Response
     */
    public function testIP(Request $request)
    {
         
        $rol=1;
        $roles=DB::select('SELECT * FROM roles');
        $rolPermisos = new Permisos;
        $permisos=$rolPermisos->rolPermisos($rol);

        return Inertia::render('SuperAdmin/IndexPermiso',[
            'roles'=>$roles,
            'permisos'=> $permisos,
        ]);
    }

}
