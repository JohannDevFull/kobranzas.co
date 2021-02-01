<?php

namespace App\Http\Controllers;

use App\Events\DeleteTempUser;
use App\Events\EndChat;
use App\Events\GuestJoinChat;
use App\Models\TempUser;
use App\Models\TempMessage;
use App\Events\NewTempMessage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use Inertia\Inertia;

class ChatController extends Controller

{
    public function index()
    {
        return Inertia::render('Chat');
    }
    public function getContacts()
    {
        if (Auth::user()->roles[0]->name == 'Cliente') {
            $contacts = User::with('roles:name')->role([
                'Empleado',
                'Admin',
                'AdminConjunto'
            ])->where('id', '!=', auth()->id())->get();
        } else {
            $contacts = User::with('roles:name')->where('id', '!=', auth()->id())->get();
        }
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();
        $contacts = $contacts->map(function ($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });
        return response()->json($contacts);
    }
    public function getAuthUser(User $user)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $user = User::with('roles:name')->find($id);
            return $user;
        } else {
            $user = '';
            return $user;
        }
    }
    public function joinChat(Request $request, TempUser $tempUser)
    {
        $this->validate($request, [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'correo'=> 'required|email',
            'documento'=>'required'
        ]);
        $lastId = TempUser::all() -> last();
        if (!$lastId) {
            $lastId = 1;
        } else {
            $lastId = $lastId->id + 1;
        }


        $id = 'Invitado' . $lastId . rand(1, 99999);
        $tempUser->idTemp = $id;
        $tempUser->name = $request->nombre;
        $tempUser->email = $request->correo;
        $tempUser->document = $request->documento;
        $tempUser->save();
        broadcast(new GuestJoinChat($tempUser, $id))->toOthers();
        return $tempUser;
    }
    public function getPendingchats(TempUser $tempUser)
    {
        $tempUser = TempUser::where('status', 0)->get();
        return $tempUser;
    }
    public function endChat($id)
    {
        $tempmessage = new TempMessage;
        $tempmessage =  TempMessage::where('to', '=', $id);
        $tempmessage->delete();
        $tempmessage2 = new TempMessage;
        $tempmessage2 =  TempMessage::where('from', '=', $id);
        $tempmessage2->delete();
        $tempUser = new TempUser();
        $tempUser =  TempUser::where('idTemp', '=', $id);
        $tempUser->delete();
        broadcast(new DeleteTempUser($id));
        broadcast(new EndChat($id));
    }
    public function getRequestsChats(Request $request, TempUser $tempUser)
    {
        $tempUser = TempUser::all();

        $unreadIds = TempMessage::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();
        $tempUser = $tempUser->map(function ($tempUser) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $tempUser->idTemp)->first();
            $tempUser->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $tempUser;
        });
        return ($tempUser);
    }
}
