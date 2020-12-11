<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User',[
            'users' => User::orderBy('id','DESC')->get(), 
        ]);
    
    }
   
    public function create()
    {
        return Inertia::render('User/create');
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'role' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
            'tipo_de_documento' => 'required',
            'documento' => 'required',
            'telefono' => 'required',

        ]);
        if($request['role']=='client'){
            $this->validate($request, [
                'codigo_de_cliente' => 'required',
                'numero_de_contrato' => 'required',
    
            ]);
        }

        $request['contraseña']=bcrypt($request['contraseña']);

        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => $request->contraseña,
            'doc_type' => $request->tipo_de_documento,
           'document' => $request->documento,
            'phone_one' => $request->telefono,
            'phone_two '=> $request->phone_two,       
            ]);
           
    
        $user_id =  DB::getPdo()->lastInsertId();
        switch ($request['role']) {
            case 'client':
                $user = User::find($user_id); 
                $user->assignRole('Cliente');
                $client=Client::create([
                    'client_code'=>$request->codigo_de_cliente,
                    'contract_number'=>$request->numero_de_contrato,
                    'user_id'=>$user_id,
 
                ]);
 
                break;
            case 'employee':
                $user = User::find($user_id); 
                $user->assignRole('Empleado');
                break;
            case 'groupAdmin':
                $user = User::find($user_id); 
                $user->assignRole('AdminConjunto');
                break;
            case 'admin':
                $user = User::find($user_id); 
                $user->assignRole('Admin');
                break;
            
            default:
            $user = User::find($user_id); 
            $user->assignRole('Cliente');
                break;
        }
    }
       
        

    public function show(User $user,$id)
    {   

        return Inertia::render('User/show',[
            'userinfo' => User::with('roles:name')->find($id),
        ]);
        
      
    }

    public function edit(User $user)
    {
        return 'Tiene permiso de editar';
    }

    public function destroy(User $user)
    {
        return 'Tiene permiso de eliminar';
    }
}
