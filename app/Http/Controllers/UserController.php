<?php

namespace App\Http\Controllers;

use App\Models\Buildings;
use App\Models\Clients;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User');
    }

    public function paginate(Request $request)
    {
        $show = $request['show'];
        $user = User::orderBy('id', 'DESC')
        ->where('name','like','%'.$request['search'].'%')
        ->orwhere('document','like','%'.$request['search'].'%')
        ->paginate($show);
        return [
            'pagination' => [
                'total' => $user->total(),
                'current_page' => $user->currentPage(),
                'per_page' => $user->perPage(),
                'last_page' => $user->lastPage(),
                'from' => $user->firstItem(),
                'to' => $user->lastPage(),

            ],
            'users' => $user,
        ];
    }

    public function create()
    {
        return Inertia::render('User/create');
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'role' => 'required',
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required|email|unique:users,email',
            'contraseña' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'confirmar_contraseña' => 'required_with:contraseña|same:contraseña|min:6',
            'tipo_de_documento' => 'required',
            'documento' => 'required|unique:users,document',
            'telefono' => 'required',

        ]);
        if ($request['role'] == 'client') {
            $this->validate($request, [
                'codigo_de_cliente' => 'required',
                'numero_de_contrato' => 'required',
            ]);
        }

        $request['contraseña'] = bcrypt($request['contraseña']);

        $user = User::create([
            'name' => ucwords($request->nombre),
            'email' => $request->correo,
            'password' => $request->contraseña,
            'doc_type' => $request->tipo_de_documento,
            'document' => $request->documento,
            'phone_one' => $request->telefono,
            'phone_two' => $request->phone_two,
        ]);
        switch ($request['role']) {
            case 'client':
                $user = User::find($user->id);
                $user->assignRole('Cliente');

                $client = Clients::create([
                    'client_code' => $request->codigo_de_cliente,
                    'contract_number' => $request->numero_de_contrato,
                    'state_id' => $request->estado,
                    'user_id' => $user->id,
                    'building_id' => $request->conjunto,

                ]);

                break;
            case 'employee':
                $user = User::find($user->id);
                $user->assignRole('Empleado');
                break;
            case 'group':
                $user = User::find($user->id);
                $user->assignRole('AdminConjunto');
                break;
            case 'admin':
                $user = User::find($user->id);
                $user->assignRole('Admin');
                break;

            default:
                $user = User::find($user->id);
                $user->assignRole('Cliente');
                break;
        }
    }

    public function show(User $user, $id)
    {
        $user = User::with('roles:name')->find($id);
        if ($user->roles[0]->name=='Cliente') {
            $client = Clients::select('*')->where('user_id', '=', $id)->get();
            $client=$client[0];
        }
        else{
            $client='';
        }
        $buildings=Buildings::all();
        $states=State::all();

        return Inertia::render('User/show', [
            'userinfo' => $user,
            'clientinfo' => $client,
            'conjuntos'=>$buildings,
            'estados'=>$states
        ]);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required  |email| unique:users,email,' . $id,
            'tipo_de_documento' => 'required',
            'documento' => 'required| unique:users,document,' . $id,
            'telefono' => 'required',

        ]);
        if($request->role=='Cliente'){
            $this->validate($request, [
                'codigo_de_cliente' => 'required| unique:clients,client_code,' . $request->clientid.',id_client',
                'numero_de_contrato' => 'required | unique:clients,contract_number,' . $request->clientid.',id_client',
                'conjunto' => 'required',
                'estado' => 'required',
    
            ]);
        }
        User::find($id)->update([
            'name' => ucwords($request->nombre),
            'email' => $request->correo,
            'doc_type' => $request->tipo_de_documento,
            'document' => $request->documento,
            'phone_one' => $request->telefono,
            'phone_two ' => $request->phone_two,
        ]);
        if($request->role=='Cliente'){
            Clients::find($request->clientid)->update([
                'client_code' => $request->codigo_de_cliente,
                'contract_number' => $request->numero_de_contrato,
                'building_id' => $request->conjunto,
                'state_id' => $request->estado
                
            ]);
        }
    }

    public function destroy($id)
    {
        $user = User::findORFail($id);

        $user->delete();
    }
}
