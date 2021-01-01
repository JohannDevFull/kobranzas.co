<?php

namespace App\Http\Controllers;

use App\Models\Calls;
use App\Models\Llamada;
use App\Models\User;
use App\Models\llamadas;
use Illuminate\Database\Query\orderBy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia; 

class LlamadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return Inertia::render('Empleado/Index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function agreement($id)
    {
        // $buscar=$id;
 
        // $conj=Buildings::select('*')
        //                     ->where('id_building',$buscar)
        //                     ->join('users', 'administrator_id', '=', 'users.id')
        //                     ->get();
        // $conjunto=$conj[0];     


        // $clients=Clients::select('*')
        //                 ->where('building_id',$buscar)
        //                 ->join('users', 'user_id', '=', 'id')
        //                 ->get();
        

        // $num=sizeof($clients);  

        return Inertia::render('Empleado/AcuerdoCuenta/AgreementAccount',[
            // 'conjunto' => $conjunto,
            // 'clientes' => $clients,
            // 'num' => $num,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarClientes(Request $request)
    {   
        $buscar=$request->buscar;
        $users_cliente=User::role('Cliente')
                        ->where('name', 'like', '%'.$buscar.'%')
                        ->get();
        return response()->json($users_cliente);

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCall(Request $request)
    {   
        $id=$request->id;
        $call = Calls::select('*') 
                    ->where('id_call',$id) 
                    ->get();
        return response()->json($call);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexVentana(Request $request)
    {   
        return Inertia::render('Empleado/VentanaIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empleado = Auth::id();
        $cliente=User::find($id);  

        $llamadas=DB::select("SELECT id_call,client_id,name_call,phone_call,users.name as 'employee_id',description,state_id,calls.created_at,calls.updated_at FROM calls 
            INNER JOIN users
            on calls.employee_id = users.id  WHERE client_id=".$id);
        
        $id_building=DB::select('SELECT building_id FROM clients where user_id='.$id);
        $conjunto=DB::select('SELECT name_building FROM buildings where id_building='.$id_building[0]->building_id);
        
        $conjuntoNombre=$conjunto[0]->name_building;  
        
        return Inertia::render('Empleado/Llamada',[
            'empleadoid' => $empleado, 
            'cliente' => $cliente, 
            'llamadas' => $llamadas, 
            'conjunto' => $conjuntoNombre, 
        ]);

    }



    public function client($id)
    {
        $empleado = Auth::id();
        $user=User::find($id); 
         
        
        return Inertia::render('Empleado/AcuerdoCuenta/Client', [
            'cliente' => $user, 
            'empleadoid' => $empleado,  
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ventanaCreate($id)
    {
        
        $user= User::find($id); 
        
        return Inertia::render('Empleado/Llamada', [
            'cliente' => $user, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'cliente'=>'required',
            'nombre'=>'required',
            'telefono'=>'required',
            'idempleado'=>'required',
            'descripcion'=>'required',
            'estado'=>'required',

        ]);

        $call= Calls::create([  
            'client_id'=>$request->cliente,
            'name_call'=>$request->nombre,
            'phone_call'=>$request->telefono,
            'employee_id'=>$request->idempleado,
            'description'=>$request->descripcion,
            'state_id'=>$request->estado,
        ]); 
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
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

    public function test($value='')
    {
        Permisos::roles();
    }
}
