<?php

namespace App\Http\Controllers;

use App\Exports\Buildings\MultiSheetTemplate;
use App\Models\Buildings;
use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Conjuntos/Index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarConjuntos(Request $request)
    {   
        $buscar=$request->id; 
        $conjuntos=Buildings::select('*')
                            ->join('users','buildings.administrator_id', '=', 'id')
                            ->get();
                            $conjuntos->makeHidden(['password']);
        return response()->json($conjuntos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarAdministradores()
    {    
        $administradores=User::role('AdminConjunto')->get(); 
        return response()->json($administradores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Conjuntos/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $flight = Buildings::create([ 
            'name_building'=>$request->nombre,
            'address_building'=> $request->direccion, 
            'phone_building'=>$request->telefono,
            'administrator_id'=>$request->administrador,
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
        $buscar=$id;
 
        $conj=Buildings::
                            where('id_building',$buscar)
                            ->get();
        $conjunto=$conj[0]; 
        
        $conju=User::where('id','=',$conjunto->administrator_id)->get();

        $clients=Clients::select('*')
                            ->where('building_id',$buscar)
                            ->join('users', 'user_id', '=', 'id')
                            ->get();
        

        $num=sizeof($clients);  

        return Inertia::render('Admin/Conjuntos/Show',[
            'conjunto' => $conjunto,
            'clientes' => $clients,
            'conjuntoinfo'=>$conju[0],
            'num' => $num,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buscar=$id; 

        $conjunto=Buildings::find($buscar);  

        return Inertia::render('Admin/Conjuntos/Edit',[
            'conjunto' => $conjunto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //  

        $conjunto = Buildings::find($id);

        $conjunto->name_building = $request->nombre;
        $conjunto->address_building = $request->direccion;
        $conjunto->phone_building = $request->telefono;
        $conjunto->administrator_id = $request->administrador;

        $conjunto->save();

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
    public function exportTemplate()
    {
        
        return Excel::download(new MultiSheetTemplate, 'plantilla.xlsx');
    }
}
