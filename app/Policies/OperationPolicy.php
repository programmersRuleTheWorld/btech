<?php

namespace App\Policies;

use App\Operation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OperationPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }
    
    /**
     * Determine whether the user can view any operations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the operation.
     *
     * @param  \App\User  $user
     * @param  \App\Operation  $operation
     * @return mixed
     */
    public function view(User $user, Operation $operation)
    {
        return $user->getPermission('show-operation') && $operation->user_id == $user->id;
    }

    /**
     * Determine whether the user can create operations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the operation.
     *
     * @param  \App\User  $user
     * @param  \App\Operation  $operation
     * @return mixed
     */
    public function update(User $user, Operation $operation)
    {
        return $user->getPermission('update-operation');
    }

    /**
     * Determine whether the user can delete the operation.
     *
     * @param  \App\User  $user
     * @param  \App\Operation  $operation
     * @return mixed
     */
    public function delete(User $user, Operation $operation)
    {
        return $user->getPermission('delete-operation');
    }

    /**
     * Determine whether the user can restore the operation.
     *
     * @param  \App\User  $user
     * @param  \App\Operation  $operation
     * @return mixed
     */
    public function restore(User $user, Operation $operation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the operation.
     *
     * @param  \App\User  $user
     * @param  \App\Operation  $operation
     * @return mixed
     */
    public function forceDelete(User $user, Operation $operation)
    {
        //
    }
}
