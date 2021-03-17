<?php

namespace App\Http\Controllers;

use App\Events\AgreementEvent;
use App\Events\AgreementEventAdmin;
use App\Models\Agreement;
use App\Models\Buildings;
use App\Models\Calls;
use App\Models\Clients;
use App\Models\Llamada;
use App\Models\Movements;
use App\Models\Permisos;
use App\Models\User;
use App\Models\llamadas;
use App\Models\Notification;
use App\Models\Reminder;
use App\Notifications\Notify;
use Carbon\Carbon;
use Illuminate\Database\Query\orderBy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as NotificationSend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Prophecy\Call\Call;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function misLlamadas(Request $request)
    {
        return Inertia::render('Empleado/MisLlamadas');
    }
    public function paginate(Request $request)
    {
        $show = $request['show'];
        $calls = Calls::select('calls.name_call', 'calls.client_id', 'calls.phone_call', 'state.description as state_name', 'calls.description', 'buildings.name_building', 'calls.created_at')
            ->join('clients', 'calls.client_id', '=', 'clients.id_client')
            ->join('buildings', 'clients.building_id', '=', 'buildings.id_building')
            ->join('state', 'clients.state_id', '=', 'state.id_state')
            ->orderBy('calls.id_call', 'DESC')
            ->where('calls.employee_id', '=', Auth::user()->id)->paginate($show);
        return [
            'pagination' => [
                'total' => $calls->total(),
                'current_page' => $calls->currentPage(),
                'per_page' => $calls->perPage(),
                'last_page' => $calls->lastPage(),
                'from' => $calls->firstItem(),
                'to' => $calls->lastPage(),

            ],
            'calls' => $calls,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function agreement($id)
    {

        $clienteUser = User::where('id', '=', $id)->get();

        $cliente = DB::select("SELECT * FROM `clients` 
                             INNER JOIN users 
                             ON clients.user_id = users.id  
                             WHERE user_id=" . $id);

        if ($debito = DB::select("SELECT * FROM movements  WHERE  `user_id`=" . $id . " LIMIT 1")) {
            $all = DB::select("SELECT * FROM movements WHERE  `user_id`=" . $id);

            $debito = DB::select("SELECT SUM(valor_movement) AS 'debito' FROM movements 
                                WHERE  type_movement_id=1 AND `user_id`=" . $id);
            $credito = DB::select("SELECT SUM(valor_movement) AS 'credito' FROM movements 
                                WHERE  type_movement_id=2 AND `user_id`=" . $id);
            $cuenta = $debito[0]->debito - $credito[0]->credito;
        } else {
            $cuenta = 0;
            $all = 0;
        }

        $acuerdos = DB::select('SELECT *,state.description FROM agreements 
                                INNER JOIN state
                                on state.id_state= agreements.state_id 
                                where user_id=' . $id);

        if (!$acuerdos) {
            $acuerdos = 0;
        }

        $id_building = DB::select('SELECT building_id FROM clients where user_id=' . $id);
        $conjunto = DB::select('SELECT * FROM buildings where id_building=' . $id_building[0]->building_id);

        $estado = $cliente[0]->state_id;

        $acuerdo_actual = DB::select('SELECT description FROM state where id_state=' . $estado);

        $conjuntoNombre = $conjunto[0]->name_building;

        $llamadas = DB::select("SELECT id_call,client_id,name_call,phone_call,users.name as 'employee_id',description,state_id,calls.created_at,calls.updated_at FROM calls 
                INNER JOIN users
                on calls.employee_id = users.id  WHERE client_id=" . $id);

        return Inertia::render('Empleado/AcuerdoCuenta/AgreementAccount', [
            'conjunto' => $conjunto[0],
            'cliente' => $cliente[0],
            'cuenta' => $cuenta,
            'acuerdo' => $acuerdo_actual,
            'acuerdos' => $acuerdos,
            'llamadas' => $llamadas,
            'movimientos' => $all,
            'photo' => $clienteUser[0]->profile_photo_url,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarClientes(Request $request)
    {
        $buscar = $request->buscar;
        // $users_cliente=User::role('Cliente')
        //                 ->where('name', 'like', '%'.$buscar.'%')
        //                 ->get();

        $users_cliente = DB::select("SELECT id,name,email,client_code,contract_number,state_id,user_id,building_id,description
            FROM clients 
            INNER JOIN state
            on state.id_state=clients.state_id
            INNER JOIN users
            on users.id=clients.user_id WHERE  users.name like '%".$buscar."%' OR clients.client_code like '%".$buscar."%' LIMIT 50" ); 

        return response()->json($users_cliente);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCall(Request $request)
    {
        $id = $request->id;
        $call = Calls::select('*')
            ->where('id_call', $id)
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
        $name = DB::select("SELECT name FROM users WHERE id=" . $empleado);

        if ($debito = DB::select("SELECT * FROM movements  WHERE  `user_id`=" . $id . " LIMIT 1")) {
            $debito = DB::select("SELECT SUM(valor_movement) AS 'debito' FROM movements 
                                WHERE  type_movement_id=1 AND `user_id`=" . $id);
            $credito = DB::select("SELECT SUM(valor_movement) AS 'credito' FROM movements 
                                WHERE  type_movement_id=2 AND `user_id`=" . $id);
            $saldo = 1;
        } else {
            $saldo = 0;
        }


        if ($saldo === 0) {
            return Redirect::route('llamadas.agreement', ['id' => $id]);
        } else {
            $clienteinfo = User::where('id', '=', $id)->get();
            $cliente = DB::select("SELECT * FROM `clients` 
                                 INNER JOIN users 
                                 ON clients.user_id = users.id  
                                 WHERE user_id=" . $id);

            $llamadas = DB::select("SELECT id_call,client_id,name_call,phone_call,users.name as 'employee_id',description,state_id,calls.created_at,calls.updated_at FROM calls 
                INNER JOIN users
                on calls.employee_id = users.id  WHERE client_id=" . $id);

            $id_building = DB::select('SELECT building_id FROM clients where user_id=' . $id);
            $conjunto = DB::select('SELECT * FROM buildings where id_building=' . $id_building[0]->building_id);

            $estado = $cliente[0]->state_id;

            $acuerdo_actual = DB::select('SELECT description FROM state where id_state=' . $estado);

            $conjuntoNombre = $conjunto[0]->name_building;



            $cuentaTotal = $debito[0]->debito - $credito[0]->credito;

            return Inertia::render('Empleado/Llamada', [
                'empleadoid' => $empleado,
                'name' => $name[0]->name,
                'conjunto' => $conjuntoNombre,
                'cliente' => $clienteinfo[0],
                'acuerdo' => $acuerdo_actual,
                'llamadas' => $llamadas,
                'cuentaTotal' => $cuentaTotal,
                'admin' => $conjunto[0]->valor_administracion,
            ]);
        }
    }





    public function account($id)
    {
        $empleado = Auth::id();
        $user = User::find($id);
        $extracto = Permisos::extracto($id);


        return Inertia::render('Empleado/AcuerdoCuenta/StateAccount', [
            'cliente' => $user,
            'empleadoid' => $empleado,
            'extracto' => $extracto,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ventanaCreate($id)
    {

        $user = User::find($id);

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
            'cliente' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'idempleado' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',

        ]);

        $call = Calls::create([
            'client_id' => $request->cliente,
            'name_call' => $request->nombre,
            'phone_call' => $request->telefono,
            'employee_id' => $request->idempleado,
            'description' => $request->descripcion,
            'state_id' => $request->estado,
        ]);

        Clients::where('user_id', $request->cliente)->update([
            'state_id' => $request->estado
        ]);
    }

    public function storeAgreement(Request $request)
    {

        $this->validate($request, [
            'cliente'=>'required',
            'nombre'=>'required',
            'telefono'=>'required',
            'idempleado'=>'required',
            'descripcion'=>'required',
            'estado'=>'required',
            'deuda_actual'=>'required',
            'cuotas'=>'required',
            'abono'=>'required',
            'dia_fecha_pago'=>'required',
            'observaciones'=>'required',

        ]);

        $call= Calls::create([  
            'client_id'=>$request->cliente,
            'name_call'=>$request->nombre,
            'phone_call'=>$request->telefono,
            'employee_id'=>$request->idempleado,
            'description'=>$request->descripcion,
            'state_id'=>$request->estado,
        ]); 
        
        $iva=DB::select("SELECT * FROM movements WHERE  user_id=".$request->cliente." AND description_movement='IVA' ORDER BY id_movement asc limit 1" );

        $gastos_cobranzas=DB::select("SELECT * FROM movements WHERE  user_id=".$request->cliente." AND description_movement='Gastos cobranzas' ORDER BY id_movement asc limit 1" );

        $capital=DB::select("SELECT * FROM movements WHERE  user_id=".$request->cliente." AND description_movement='Capital' ORDER BY id_movement asc limit 1" );
        
        $intereses=DB::select("SELECT * FROM movements WHERE  user_id=".$request->cliente." AND description_movement='Intereses' ORDER BY id_movement asc limit 1" );

        $agreement=Agreement::create([   
            'user_id'=>$request->cliente,
            'employee_id'=>$request->idempleado,
            'name_employee'=>$request->nombre_empleado,
            'current_debt'=>$request->deuda_actual,
            'iva'=>$iva[0]->valor_movement,
            'capital'=>$capital[0]->valor_movement,
            'intereses'=>$intereses[0]->valor_movement,
            'administration'=>$request->administracion,
            'gastos_cobranzas'=>$gastos_cobranzas[0]->valor_movement,
            'dia_fecha_pagos'=>$request->dia_fecha_pago,
            'credit'=>$request->abono,
            'quotas'=>$request->cuotas,
            'total_cuota'=>$request->valor_cuota,
            'observations'=>$request->observaciones,
            'state_id'=>$request->estado,
        ]); 

        Clients::where('user_id',$request->cliente)->update([
            'state_id' => $request->estado
        ]);

        $user = User::select('id', 'name', 'email')->where('id', '=', Auth::user()->id)->get();
        $client = Clients::select('users.id', 'users.name', 'clients.building_id', 'buildings.name_building')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('buildings', 'clients.building_id', '=', 'buildings.id_building')
            ->where('users.id', '=', $request->cliente)->get();
        $notificaction = Notification::create([
            'from' => $user[0],
            'action' => 'hizo',
            'notificable' => 'acuerdo',
            'info' => $client[0]
        ]);

        return $notificaction;
    }
    public function sendEmails(Request $request)
    {

        $id = $request->notification;
        $when = Carbon::now()->addSecond(10);
        $notifications = Notification::where('id', '=', $id)->where('sent', 0)->get();
        $info = json_decode($notifications[0]['info']);
        $conjunto = Buildings::where('id_building', '=', $info->building_id)->get();
        broadcast(new AgreementEvent($notifications[0]))->toOthers();
        broadcast(new AgreementEventAdmin($notifications[0], $conjunto[0]))->toOthers();
        $admin = User::select('id', 'name', 'email')->role('Admin')->get();
        $admins = User::select('users.*')->where('users.id', '=', $conjunto[0]->administrator_id)->get();
        NotificationSend::send($admins, (new Notify($notifications[0]))->delay($when));
        NotificationSend::send($admin, (new Notify($notifications[0]))->delay($when));
        Notification::where('id', '=', $id)->update(['sent' => true]);
    }


    public function storeAccount(Request $request)
    {
        $id_building = DB::select('SELECT building_id FROM clients where user_id=' . $request->cliente_id);
        $conjunto = DB::select('SELECT * FROM buildings where id_building=' . $id_building[0]->building_id);
        $fecha=Carbon::now()->toDateTimeString();
        $this->validate($request, [
            'cliente_id' => 'required',
            'capital_deuda' => 'required',
            'intereses' => 'required',
        ]);

        $call= Movements::create([
            'user_id'=>$request->cliente_id, 
            'type_movement_id'=>1,
            'valor_movement'=>$request->capital_deuda,
            'date'=>$fecha,
            'description_movement'=>'Capital', 
        ]);

        $call= Movements::create([
            'user_id'=>$request->cliente_id, 
            'type_movement_id'=>1,
            'valor_movement'=>$request->intereses, 
            'date'=>$fecha, 
            'description_movement'=>'Intereses', 
        ]); 

        $gastos_cobranzas=(($request->capital_deuda+$request->intereses)*$conjunto[0]->gastos_cobranzas)/100;
        
        $gastos= Movements::create([
            'user_id'=>$request->cliente_id, 
            'type_movement_id'=>1,
            'valor_movement'=>$gastos_cobranzas, 
            'date'=>$fecha, 
            'description_movement'=>'Gastos cobranzas', 
        ]);

        $iva=($gastos_cobranzas*19)/100;

        $iva_cobranzas= Movements::create([
            'user_id'=>$request->cliente_id, 
            'type_movement_id'=>1,
            'valor_movement'=>$iva, 
            'date'=>$fecha, 
            'description_movement'=>'IVA', 
        ]);


    }

    public function createReminder(Request $request)
    {
        $mytime = Carbon::now();
        $fecha = $request->fecha;

        $this->validate($request, [
            'fecha' => 'required|after:' . $mytime,
            'descripcion' => 'required',
        ]);
        Reminder::create([
            'description' => $request->descripcion,
            'date' => $request->fecha,
            'employee_id' => Auth::user()->id,
            'client_id' => $request->client_id
        ]);
    }
    public function recordatorios()
    {
        return Inertia::render('Recordatorios/Index');
    }
    public function getReminders  (Request $request)
    {
        $show = $request['show'];
        $remind = Reminder::select('reminders.*','users.name')
            ->join('users', 'reminders.client_id', '=', 'users.id')
            ->orderBy('reminders.date', 'ASC')
            ->where('reminders.status','=',$request->status)
            ->where('reminders.employee_id', '=', Auth::user()->id)->paginate($show);
        return [
            'pagination' => [
                'total' => $remind->total(),
                'current_page' => $remind->currentPage(),
                'per_page' => $remind->perPage(),
                'last_page' => $remind->lastPage(),
                'from' => $remind->firstItem(),
                'to' => $remind->lastPage(),

            ],
            'reminders' => $remind,
        ];  
    }
    public function toggleReminder(Request $request){
        $reminder = Reminder::where('id','=',$request->id)->get();

    Reminder::find($reminder[0]->id)->update([
             'status'=> ($reminder[0]->status == 1) ? 0 : 1
         ]);
    }

    public function test($value = '')
    {
        Permisos::roles();
    }
}
