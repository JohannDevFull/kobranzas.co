<?php

namespace App\Http\Controllers;

use App\Models\Buildings;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
                            ->join('users','buildings.administrator_id', '=', 'users.id')
                            ->get();
        return response()->json($conjuntos);
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
 
        $conj=Buildings::select('*')
                            ->where('id_building',$buscar)
                            ->join('users', 'administrator_id', '=', 'id')
                            ->get();
        $conjunto=$conj[0];     

        return Inertia::render('Admin/Conjuntos/Show',[
            'conjunto' => $conjunto,
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
}
