<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User');
    }
    
    public function paginate(Request $request)
    {
        $show = $request['show'];
        $user = User::orderBy('id', 'DESC')->paginate($show);
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
            'contraseña' => 'required',
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
            'phone_two ' => $request->phone_two,
        ]);


        $user_id =  DB::getPdo()->lastInsertId();

        switch ($request['role']){
            case 'client':
                $user = User::find($user_id);
                $user->assignRole('Cliente');
                $client = Client::create([
                    'client_code' => $request->codigo_de_cliente,
                    'contract_number' => $request->numero_de_contrato,
                    'user_id' => $user_id,

                ]);

            break;
            case 'employee':
                $user = User::find($user_id);
                $user->assignRole('Empleado');
            break;
            case 'group':
                $user = User::find($user_id);
                $user->assignRole('AdminConjunto');
                break;
            case 'admin':
                $user = User::find($user_id);
                $user->assignRole('Admin');
                break;

            default:
                $user = User::find($user_id);
                $user->assignRole('Cliente');
                break;
        }
    }

    public function show(User $user, $id)
    {

        return Inertia::render('User/show', [
            'userinfo' => User::with('roles:name')->find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required  |email| unique:users,email,'.$id,
            'tipo_de_documento' => 'required',
            'documento' => 'required| unique:users,document,'.$id,
            'telefono' => 'required',

        ]);
        $user = User::find($id)->update([
            'name' => ucwords($request->nombre),
            'email' => $request->correo,
            'doc_type' => $request->tipo_de_documento,
            'document' => $request->documento,
            'phone_one' => $request->telefono,
            'phone_two ' => $request->phone_two,
        ]);
    }

    public function destroy($id)
    {
        $user = User::findORFail($id);

        $user->delete();
    }
}