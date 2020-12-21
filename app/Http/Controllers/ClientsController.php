<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    
    public function estados(Request $request)
    {   
        $buscar=$request->id; 
        $sta= DB::table('state')->get();
        return response()->json($sta);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarClientes(Request $request)
    {   
        // $buscar=$request->buscar;
        // $users_cliente=User::role('Cliente')
        //                 ->where('name', 'like', '%'.$buscar.'%')
        //                 ->get();
        // return response()->json($users_cliente);


    	$buscar=$id;
 
        $conj=Clients::select('*')
                            ->where('id_building',$buscar)
                            ->join('users', 'administrator_id', '=', 'users.id')
                            ->get();
        $conjunto=$conj[0];     

        return Inertia::render('Admin/Conjuntos/Show',[
            'conjunto' => $conjunto,
        ]);


        $buscar=$request->buscar;
        $users_cliente=Clients::role('Cliente')->get();
        return response()->json($users_cliente);

    }
}
