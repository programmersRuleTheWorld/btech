<?php

namespace App\Events\ClientApplicationComments;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientApplicationCommentCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $clientApplicationComment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($clientApplicationComment)
    {
        $this->clientApplicationComment = $clientApplicationComment;
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
