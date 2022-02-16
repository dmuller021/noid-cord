<?php

namespace App\Events;

use App\Models\User;
use App\Models\friends;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class privateMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $friendID;
    public $user;
    public $privateMessage;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $privateMessage, $friendID)
    {
        $this->user = $user;
        $this->privateMessage = $privateMessage;
        $this->friendID = $friendID;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('friends.'.$this->friendID);
    }

    public function broadcastAs() {
        return 'DM';
    }
}
