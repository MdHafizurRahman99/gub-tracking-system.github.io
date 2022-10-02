<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BusMoved implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $lat,$lng,$bid;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($lng,$lat,$bid)
    {
        $this->lat=$lat;
        $this->lng=$lng;
        $this->bid=$bid;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('updateTracker');
    }
}
