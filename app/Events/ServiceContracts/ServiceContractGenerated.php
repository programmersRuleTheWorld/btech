<?php

namespace App\Events\ServiceContracts;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServiceContractGenerated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $serviceContract;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($serviceContract)
    {
        $this->serviceContract = $serviceContract;
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
