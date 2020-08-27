<?php

namespace App\Policies;

use App\ClientApplication;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientApplicationPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view any client applications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the client application.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplication  $clientApplication
     * @return mixed
     */
    public function view(User $user, ClientApplication $clientApplication)
    {
        return $user->getPermission('show-client-application') && $user->id == $clientApplication->user_id;
    }

    /**
     * Determine whether the user can create client applications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the client application.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplication  $clientApplication
     * @return mixed
     */
    public function update(User $user, ClientApplication $clientApplication)
    {
        return $user->getPermission('update-client-application') && $user->id == $clientApplication->user_id;
    }

    /**
     * Determine whether the user can delete the client application.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplication  $clientApplication
     * @return mixed
     */
    public function delete(User $user, ClientApplication $clientApplication)
    {
        return false;
    }

    public function appendTo(User $user)
    {
        return $user->getPermission('append-client-application');
    }

    public function revokeAll(User $user)
    {
        return $user->getPermission('revoke-auth-codes');
    }

    /**
     * Determine whether the user can restore the client application.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplication  $clientApplication
     * @return mixed
     */
    public function restore(User $user, ClientApplication $clientApplication)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the client application.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplication  $clientApplication
     * @return mixed
     */
    public function forceDelete(User $user, ClientApplication $clientApplication)
    {
        //
    }
}
