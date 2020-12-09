<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permisos;
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
        $data=DB::select('SELECT * FROM roles');
        $rolPermisos = new Permisos;
        $permisos=$rolPermisos->rolPermisos($rol);

        return Inertia::render('SuperAdmin/Permisos',[
            'data' => $data,
            'perm' => $permisos,
        ]);
    }
    public function getRol(User $user)
    {
        
        $user=User::select('id','name')->with('roles:name')->find($user);
      
        return $user;
    }


    /**
     * VER ROLES Y SUS PERMISOS
     *
     * @return \Illuminate\Http\Response
     */
    public function storeRP(Request $request)
    {
        
        $rol=1;
        $data=DB::select('SELECT * FROM roles');
        $rolPermisos = new Permisos;
        $permisos=$rolPermisos->rolPermisos($rol);

        return Inertia::render('SuperAdmin/Permisos',[
            'data' => $data,
            'perm' => $permisos,
        ]);
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

    /**
     * CREAR PERMISO
     *
     * @return \Illuminate\Http\Response
     */
    public function createRol(Request $request)
    {
        Role::create(['name' =>$request->name]);
        return Redirect::route('permisos');
    }
    
    /**
     * CREAR PERMISO
     *
     * @return \Illuminate\Http\Response
     */
    public function createPermiso(Request $request)
    {
        //
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
        //
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
}
