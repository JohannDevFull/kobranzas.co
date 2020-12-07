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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'doc_type' => 'required',
            'document' => 'required',
            'phone_one' => 'required',

        ]);
        if($request['role']=='client'){
            $this->validate($request, [
                'client_code' => 'required',
                'contract_number' => 'required',
    
            ]);
        }

        $request['password']=bcrypt($request['password']);

        $user = User::create($request->all());
        $user_id =  DB::getPdo()->lastInsertId();
        switch ($request['role']) {
            case 'client':
                $user = User::find($user_id); 
                $user->assignRole('Cliente');
                $client=Client::create([
                    'client_code'=>$request->client_code,
                    'contract_number'=>$request->contract_number,
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
            'user' => User::with('roles:name')->find($id), 
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
