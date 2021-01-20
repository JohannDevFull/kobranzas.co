<?php

namespace App\Events;

use App\Models\TempUser;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChangeGuestStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public  $guest;
    public  $admin;


    public function __construct($guest,$admin)
    {
        
        $this->guest=$guest;
        $this->admin=$admin;
    }

    public function broadcastOn()
    {
        return new Channel('status.'.$this->guest[0]->idTemp);
    }
}
