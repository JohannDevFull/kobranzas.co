<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Notifications\Contact;
use App\Notifications\Notify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as NotificationSend;
use Illuminate\Support\Facades\Auth;
use LengthException;
use PhpParser\Node\Expr\Print_;

class NotificationsController extends Controller
{
    public function getNotifications()
    {
        if (Auth::user()->roles[0]->name == 'Admin') {
            $info = [];
            $not = Notification::where('seenBy', 'not like', '%,' . Auth::user()->id . ',%')->get();
        } else if (Auth::user()->roles[0]->name == 'AdminConjunto') {
            $admin_building = User::select('*')
                ->join('buildings', 'users.id', '=', 'buildings.administrator_id')->where('users.id', '=', Auth::user()->id)->first();
            $not = Notification::where('seenBy', 'not like', '%,' . Auth::user()->id . ',%')
                ->where('info', 'like', '%\\"building_id\\":' . $admin_building->id_building . ',%')->get();
        }
        return $not;
    }
    public function markAsSeen()
    {
        if (Auth::user()->roles[0]->name == 'Admin') {

            $notifications = Notification::all();
        } else if (Auth::user()->roles[0]->name == 'AdminConjunto') {
            $admin_building = User::select('buildings.id_building')->join('buildings', 'users.id', '=', 'buildings.administrator_id')->where('users.id', '=', Auth::user()->id)->get();
            $notifications = Notification::where('info', 'like', '%\\"building_id\\":' . $admin_building[0]->id_building . ',%')->get();
            
        }
        for ($j = 0; $j < $notifications->count(); $j++) {
            $x = $j;
            $seen = $notifications[$x]->seenBy;
            if ($seen == null) {
                $arr = array();
                array_push($arr, 0);
                array_push($arr, Auth::user()->id);
                array_push($arr, 0);
            } else {
                $toDelete = array("[", "]");
                $deleted = str_replace($toDelete, "", $seen);
                $arr = explode(',', $deleted);
                $arr = array_map('intval', $arr);
                
                foreach ($arr as $i) {
                    if ($i == Auth::user()->id) {
                        $v = false;
                        break;
                    }
                    $v = true;
                }
                
                if ($v) {

                    array_pop($arr);

                    array_push($arr, Auth::user()->id);

                    array_push($arr, 0);

                }
            }
            $fin = implode(',', $arr);
            $notification = Notification::where('id', '=', $notifications[$j]->id)->update(['seenBy' => $arr]);
        }

    }
    public function contact(Request $request)
    {
         $this->validate($request, [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required|email',
            'tipo_documento' => 'required',
            'documento' => 'required',
            'telefono' => 'required',
            'ciudad'=>'required',
            'mensaje'=>'required|max:300'

        ]);
        NotificationSend::route('mail', 'reyesjohan59@gmail.com')->notify(new Contact($request));
        return redirect('/');
    }
   
}
