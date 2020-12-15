<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ConjuntosController extends Controller
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
    public function cargarConjunto($id)
    {   
        $buscar=$id;
        $conjunto=DB::select('SELECT * FROM buildings WHERE id_building='.$buscar);

        return response()->json($conjunto);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarConjuntos(Request $request)
    {   
        $buscar=$request->buscar;
        $conjuntos=DB::select('SELECT * FROM buildings');

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
        // crear metodo en el modelo
        DB::insert('INSERT INTO buildings (name,address_building,phone_building,administrator_id) 
                    values (?,?,?,?)', 
                    [$request->nombre, $request->direccion,$request->telefono,$request->administrador]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "<h1>*** holaaaa mi mundoo desde ConjuntosController/show***</h1>";
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
        $buscar=$id;
        $conjunto=DB::select('SELECT * FROM buildings WHERE id_building='.$buscar);
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
}
