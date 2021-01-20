<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
   


    public function __construct(Message $message )
    {
        $this->message=$message;
        
    }

    
    public function broadcastOn()
    {
        return new Channel('chat.'.$this->message->to);
    }
    public function broadcastWith()
    {
        $this->message->load('fromContact');

        return ["message" => $this->message];
    }
}
