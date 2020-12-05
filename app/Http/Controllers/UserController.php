<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
class UserController extends Controller
{

    

    public function index()
    {
        return Inertia::render('User',[
            'users' => User::all(),
        ]);
    
    }

    public function asignar()
    {
        $user->assignRole('Administrador');
        return "Rol asignado a:";
    }

    public function create()
    {
        return 'Tiene permiso de crear';
    }

    public function show(User $user,$id)
    {
        return Inertia::render('User/show',[
            'user' => User::find($id),
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
