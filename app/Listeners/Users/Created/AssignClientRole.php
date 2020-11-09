<?php

namespace App\Listeners\Users\Created;

use App\Events\UserCreated;
use App\User;
use App\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignClientRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
            $role = Role::where('slug', 'client-user')->get();
            $event->user->roles()->attach($role);
    }
}
