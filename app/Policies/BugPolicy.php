<?php

namespace App\Policies;

use App\Bug;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BugPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }
    /**
     * Determine whether the user can view any bugs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the bug.
     *
     * @param  \App\User  $user
     * @param  \App\Bug  $bug
     * @return mixed
     */
    public function view(User $user, Bug $bug)
    {
        return $user->getPermission('view-bug');
    }

    /**
     * Determine whether the user can create bugs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the bug.
     *
     * @param  \App\User  $user
     * @param  \App\Bug  $bug
     * @return mixed
     */
    public function update(User $user, Bug $bug)
    {
        return $user->getPermission('update-bug');
    }

    /**
     * Determine whether the user can delete the bug.
     *
     * @param  \App\User  $user
     * @param  \App\Bug  $bug
     * @return mixed
     */
    public function delete(User $user, Bug $bug)
    {
        return $user->getPermission('delete-bug');
    }

    /**
     * Determine whether the user can restore the bug.
     *
     * @param  \App\User  $user
     * @param  \App\Bug  $bug
     * @return mixed
     */
    public function restore(User $user, Bug $bug)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the bug.
     *
     * @param  \App\User  $user
     * @param  \App\Bug  $bug
     * @return mixed
     */
    public function forceDelete(User $user, Bug $bug)
    {
        //
    }
}
