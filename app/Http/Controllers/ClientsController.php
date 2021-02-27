<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Buildings;
use App\Models\Clients;
use App\Models\File;
use App\Models\Movements;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $buscar = $id;

        $conj = Buildings::where('administrator_id', $buscar)->get();

        $conjunto = $conj[0];

        $conju = User::where('id', '=', $conjunto->administrator_id)->get();

        $clients = DB::select("SELECT id,name,email,client_code,contract_number,state_id,user_id,building_id,description
            FROM clients 
            INNER JOIN state
            on state.id_state=clients.state_id
            INNER JOIN users
            on users.id=clients.user_id
            WHERE `building_id`=" . $conj[0]->id_building);
        $num = sizeof($clients);

        return Inertia::render('Clientes/index', [
            'conjunto' => $conjunto,
            'clientes' => $clients,
            'conjuntoinfo' => $conju[0],
            'num' => $num,
        ]);
    }

    public function show($id)
    {
        $user = User::where('id', '=', $id)->get();
        $id_building = DB::select('SELECT building_id FROM clients where user_id=' . $id);
        $conjunto = DB::select('SELECT * FROM buildings where id_building=' . $id_building[0]->building_id);
        $conjuntoNombre = $conjunto[0]->name_building;

        return Inertia::render('Clientes/Show', [
            'cliente' => $user[0],
            'nombre_conjunto' => $conjuntoNombre,
        ]);
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
        $this->validate($request, [
            'cliente_id' => 'required',
            'tipo_movimiento' => 'required',
            'descripcion_movimiento' => 'required',
            'valor_moviminto' => 'required',
        ]);

        $mov = Movements::create([
            'user_id' => $request->cliente_id,
            'type_movement_id' => $request->tipo_movimiento,
            'valor_movement' => $request->valor_moviminto,
            'description_movement' => $request->descripcion_movimiento,
        ]);
    }

    public function cargarClientes(Request $request)
    {

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
    public function clientsConjunto(Request $request)
    {

        $buscar = $request->buscar;
        $conjunto = $request->conjunto;

        $clients = DB::select("SELECT id,name,email,client_code,contract_number,state_id,user_id,building_id,description
            FROM clients 
            INNER JOIN state
            on state.id_state=clients.state_id
            INNER JOIN users
            on users.id=clients.user_id
            WHERE  building_id=" . $conjunto . " and users.name like '%" . $buscar . "%'");


        return response()->json($clients);
    }


    public function importClients(Request $request)
    {

        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $path = $request->file('file');
        $data = Excel::import(new ClientsImport, $path);

        return response()->json(['message' => 'Subido'], 200);
    }
    public function getFiles(Request $request)
    {
        $files = File::select('*')->where('client_id', '=', $request->id)->get();
        return $files;
    }
    public function uploadFiles(Request $request)
    {
        $path_img='files/'.$request->client_id;
        $this->validate($request,[
            'descripcion'=>'required|max:100',
            'file'=>'required|file|max:4000'
        ]);
        $file = $request->file('file');
        $mytime = Carbon::now() ;
        $date=strtotime($mytime);
        $imageName = $path_img . '/' .$date.$file->getClientOriginalName();


        try {
            Storage::disk('local')->put('public/'.$imageName,  \File::get($file));
        }
        catch (\Exception $exception) {
            return response('error',400);
        }
        File::create([
            'description'=>$request->descripcion,
            'path'=>$imageName,
            'client_id'=>$request->client_id,
        ]);
    }
}
