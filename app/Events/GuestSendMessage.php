<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use App\Models\TempUser;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GuestSendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $guest;
    
    public function __construct($message,$guest)
    {
        $this->message=$message;
        $this->guest=$guest;
    }

    public function broadcastOn()
    {
        return new Channel('guestSend');
    }
}
