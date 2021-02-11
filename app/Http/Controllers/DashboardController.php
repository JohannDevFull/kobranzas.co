<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Buildings;
use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $users = User::all();
        $buildings=Buildings::all();
        $agreements=Agreement::all();
        $users=count($users);
        $buildings=count($buildings);
        $agreements=count($agreements);
        return [
        $agreements,
        $buildings,
        $users,
        0
        ];

    }
    public function getClients()
    {
        $clients=Clients::select('users.id','users.name','users.email','state.description')
        ->join('users','clients.user_id','=','users.id')
        ->join('state','clients.state_id','=','state.id_state')
        ->orderby('clients.state_id','DESC')->orderBy('clients.id_client','DESC')->get();
        return $clients;
    }
}
