<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Clients;
use App\Models\Movements;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    public function index()
    {
        return Inertia::render('Clientes');
    }
    public function getDetails()
    {
        return Inertia::render('Clientes/detalles');
    }

    public function estados(Request $request)
    {
        $buscar = $request->id;
        $sta = DB::table('state')->get();
        return response()->json($sta);
    }
    public function descripcion_movimiento_cargue(Request $request)
    { 
        $res = DB::table('description_movements')->where('nature_movement', '1')->get();
        return response()->json($res);
    }

    public function descripcion_movimiento_abono(Request $request)
    { 
        $res = DB::table('description_movements')->where('nature_movement', '2')->get();
        return response()->json($res);
    }

    public function tipo_movimiento(Request $request)
    { 
        $res = DB::table('type_movement')->get();
        return response()->json($res);
    }

    public function storeMovement(Request $request)
    { 
        $this->validate($request,[
            'cliente_id'=>'required',
            'tipo_movimiento'=>'required',
            'descripcion_movimiento'=>'required',
            'valor_moviminto'=>'required',
        ]);

        $mov= Movements::create([
            'user_id'=>$request->cliente_id, 
            'type_movement_id'=>$request->tipo_movimiento,
            'valor_movement'=>$request->valor_moviminto,
            'description_movement'=>$request->descripcion_movimiento, 
        ]);
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


        $buscar = $id;

        $conj = Clients::select('*')
            ->where('id_building', $buscar)
            ->join('users', 'administrator_id', '=', 'users.id')
            ->get();
        $conjunto = $conj[0];

        return Inertia::render('Admin/Conjuntos/Show', [
            'conjunto' => $conjunto,
        ]);


        $buscar = $request->buscar;
        $users_cliente = Clients::role('Cliente')->get();
        return response()->json($users_cliente);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importClients(Request $request)
    {

        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $path = $request->file('file');
        $data = Excel::import(new ClientsImport, $path);

        return response()->json(['message' => 'Subido'], 200);
    }
}
