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


    public function test(Request $request,$id='')
    {

        $id = Auth::id();

        $empleado=DB::select("SELECT name FROM users WHERE id=".$id); 

  
        echo "<br>";
        echo "<br>------------------------------------**** PRUEBAS JOHANN ***--------------------------------------------";
        echo "<br>";
        echo "Debito: ";
        print_r($empleado[0]->name);
        echo "<br>";

        echo "Credito: ";
        // print_r($res);
        
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
