<?php

namespace App\Acme\Events;

use App\Acme\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserUpdatedEmailEvent
{
//    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $token;
    public $newEmail;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param null $token
     * @param null $newEmail
     */
    public function __construct(User $user, $token = null, $newEmail = null)
    {
        $this->user = $user;
        $this->token = $token;
        $this->newEmail = $newEmail;
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
