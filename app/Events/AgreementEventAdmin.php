<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AgreementEventAdmin implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $notification;
    public $building;

    public function __construct($notification,$building)
    {
        $this->notification=$notification;
        $this->building=$building;

     

    }

    public function broadcastOn()
    {
        return new Channel('newAgreement.'.$this->building->administrator_id);
    }
}
