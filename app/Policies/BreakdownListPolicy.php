<?php

namespace App\Policies;

use App\BreakdownList;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BreakdownListPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        \Log($user->isAdmin());
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view any breakdown lists.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the breakdown list.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownList  $breakdownList
     * @return mixed
     */
    public function view(User $user, BreakdownList $breakdownList)
    {
        return $user->getPermission('show-breakdown-list');
    }

    /**
     * Determine whether the user can create breakdown lists.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->getPermission('store-breakdown-list');
    }

    /**
     * Determine whether the user can update the breakdown list.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownList  $breakdownList
     * @return mixed
     */
    public function update(User $user, BreakdownList $breakdownList)
    {
        return $user->getPermission('update-breakdown-list');
    }

    /**
     * Determine whether the user can delete the breakdown list.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownList  $breakdownList
     * @return mixed
     */
    public function delete(User $user, BreakdownList $breakdownList)
    {
        return $user->getPermission('delete-breakdown-list');
    }

    /**
     * Determine whether the user can restore the breakdown list.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownList  $breakdownList
     * @return mixed
     */
    public function restore(User $user, BreakdownList $breakdownList)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the breakdown list.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownList  $breakdownList
     * @return mixed
     */
    public function forceDelete(User $user, BreakdownList $breakdownList)
    {
        //
    }
}
