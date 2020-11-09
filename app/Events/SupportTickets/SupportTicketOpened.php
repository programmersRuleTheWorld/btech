<?php

namespace App\Events\SupportTickets;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SupportTicketOpened
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $supportTicket;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($supportTicket)
    {
        $this->supportTicket = $supportTicket;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
