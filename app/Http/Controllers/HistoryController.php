<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use OwenIt\Auditing\Models\Audit;

class HistoryController extends Controller
{
    public function index()
    {

        return Inertia::render('Historial');
    }
    public function getAudits(Request $request)
    {
      if($request['auditable']=='Call'){
        $audits = Audit::select('*')
        ->where('event','like', '%'.$request['event'].'%')
        ->where('auditable_type','like', '%Call%')
        ->orwhere('auditable_type','like', '%Llamada%')
        ->where('user_name','like','%'.$request->search.'%')
        ->paginate($request['show']);
 
      }
      else{

        $audits = Audit::select('*')
        ->where('event','like', '%'.$request['event'].'%')
        ->where('auditable_type','like', '%'.$request['auditable'].'%')
        ->where('user_name','like','%'.$request->search.'%')
        ->paginate($request['show']);

    }

    $audits->where('nameUser','like','%'.$request->search.'%');
        return [
            'pagination' => [
                'total' => $audits->total(),
                'current_page' => $audits->currentPage(),
                'per_page' => $audits->perPage(),
                'last_page' => $audits->lastPage(),
                'from' => $audits->firstItem(),
                'to' => $audits->lastPage(),

            ],
            'audits' => $audits

        ];
    }
    public function getDetails($id)
    {
        $audit = Audit::find($id);
        if ($audit->user_id) {
            $user = User::with('roles:name')->find($audit->user_id);
        } else {
            $user = User::with('roles:name')->find($audit->auditable_id);
        }


        return Inertia::render('Historial/detalles', [
            'userinfo' => $user,
            'auditinfo' => $audit
        ]);
    }
}
