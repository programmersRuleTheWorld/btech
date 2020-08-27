<?php

namespace App\Policies;

use App\BreakdownItem;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BreakdownItemPolicy
{
    use HandlesAuthorization;
    
    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }
    /**
     * Determine whether the user can view any breakdown items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the breakdown item.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownItem  $breakdownItem
     * @return mixed
     */
    public function view(User $user, BreakdownItem $breakdownItem)
    {
        //
    }

    /**
     * Determine whether the user can create breakdown items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->getPermission('store-breakdown-item');
    }

    /**
     * Determine whether the user can update the breakdown item.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownItem  $breakdownItem
     * @return mixed
     */
    public function update(User $user, BreakdownItem $breakdownItem)
    {
        return $user->getPermission('update-breakdown-item');
    }

    /**
     * Determine whether the user can delete the breakdown item.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownItem  $breakdownItem
     * @return mixed
     */
    public function delete(User $user, BreakdownItem $breakdownItem)
    {
        return $user->getPermission('delete-breakdown-item');
    }

    public function isComplete(User $user, BreakdownItem $breakdownItem)
    {
        return $user->getPermission('update-breakdown-item');
    }

    public function updatePrice(User $user)
    {
        return $user->getPermission('update-breakdown-item-price');
    }

    /**
     * Determine whether the user can restore the breakdown item.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownItem  $breakdownItem
     * @return mixed
     */
    public function restore(User $user, BreakdownItem $breakdownItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the breakdown item.
     *
     * @param  \App\User  $user
     * @param  \App\BreakdownItem  $breakdownItem
     * @return mixed
     */
    public function forceDelete(User $user, BreakdownItem $breakdownItem)
    {
        //
    }
}
