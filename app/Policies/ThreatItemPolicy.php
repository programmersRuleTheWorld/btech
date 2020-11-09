<?php

namespace App\Policies;

use App\ThreatItem;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreatItemPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }
    /**
     * Determine whether the user can view any threat items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the threat item.
     *
     * @param  \App\User  $user
     * @param  \App\ThreatItem  $threatItem
     * @return mixed
     */
    public function view(User $user, ThreatItem $threatItem)
    {
        //
    }

    /**
     * Determine whether the user can create threat items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the threat item.
     *
     * @param  \App\User  $user
     * @param  \App\ThreatItem  $threatItem
     * @return mixed
     */
    public function update(User $user, ThreatItem $threatItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the threat item.
     *
     * @param  \App\User  $user
     * @param  \App\ThreatItem  $threatItem
     * @return mixed
     */
    public function delete(User $user, ThreatItem $threatItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the threat item.
     *
     * @param  \App\User  $user
     * @param  \App\ThreatItem  $threatItem
     * @return mixed
     */
    public function restore(User $user, ThreatItem $threatItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the threat item.
     *
     * @param  \App\User  $user
     * @param  \App\ThreatItem  $threatItem
     * @return mixed
     */
    public function forceDelete(User $user, ThreatItem $threatItem)
    {
        //
    }
}
