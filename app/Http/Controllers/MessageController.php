<?php

namespace App\Http\Controllers;

use App\Events\ChatWithGuest;
use App\Events\ChangeGuestStatus;
use App\Events\GuestSendMessage;
use App\Events\NewMessage;
use App\Events\NewTempMessage;
use Illuminate\Http\Request;
use App\Models\TempMessage;
use App\Models\Message;
use App\Models\TempUser;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getMessagesFrom(Request $request)
    {
        $id = $request->to;

        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);


        $messages = Message::where(function ($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
            ->get();

        return response()->json($messages);
    }
    public function getGuestMessages(Request $request)
    {

        $id = $request->to;
        $user = $request->from;

        $guest = TempUser::where('idTemp', $id)->get();
        if ($guest[0]->status == 0) {
            TempUser::where('idTemp', $id)->update([
                'status' => true,
                'user_id' => auth()->id(),
                'user_name'=>Auth::user()->name
            ]);

            broadcast(new ChatWithGuest($guest, auth()->user()));
            broadcast(new ChangeGuestStatus($guest, auth()->user()));
        }
     
      
        TempMessage::where('from', $id)->where('to', $user)->update(['read' => true]);


        $messages = TempMessage::where(function ($q) use ($id, $user) {
            $q->where('from', $user);
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id, $user) {
            $q->where('from', $id);
            $q->where('to', $user);
        })
            ->get();

        return response()->json($messages);
    }
    public function getMessageForGuest(Request $request)
    {

        $id = $request->to;
        $user = $request->from;

        $guest = TempUser::where('idTemp', $id)->get();
        TempMessage::where('from', strval($id))->where('to', strval($user))->update(['read' => true]);


        $messages = TempMessage::where(function ($q) use ($id, $user) {
            $q->where('from', $user);
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id, $user) {
            $q->where('from', $id);
            $q->where('to', $user);
        })
            ->get();

        return response()->json($messages);
    }
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'from' => $request->id,
            'to' => $request->contact_id,
            'text' => $request->text
        ]);


        broadcast(new NewMessage($message))->toOthers();
    }
    public function sendMessageToGuest(Request $request)
    {
        if (auth()->id()) {
            $message = TempMessage::create([
                'from' => auth()->id(),
                'to' => $request->contact_id,
                'text' => $request->text
            ]);
            broadcast(new NewTempMessage($message, $request->name))->toOthers();
        } else {
            $guest = TempUser::where('idTemp', $request->id)->get();
            $message = TempMessage::create([
                'from' => $request->id,
                'to' => $request->contact_id,
                'text' => $request->text
            ]);
            broadcast(new GuestSendMessage($message, $guest))->toOthers();
        }
    }
}
