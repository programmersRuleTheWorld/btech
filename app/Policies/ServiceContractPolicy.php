<?php

namespace App\Policies;

use App\ServiceContract;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceContractPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view any service contracts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the service contract.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceContract  $serviceContract
     * @return mixed
     */
    public function view(User $user, ServiceContract $serviceContract)
    {
        //
    }

    /**
     * Determine whether the user can create service contracts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the service contract.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceContract  $serviceContract
     * @return mixed
     */
    public function update(User $user, ServiceContract $serviceContract)
    {
        //
    }

    /**
     * Determine whether the user can delete the service contract.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceContract  $serviceContract
     * @return mixed
     */
    public function delete(User $user, ServiceContract $serviceContract)
    {
        //
    }

    /**
     * Determine whether the user can restore the service contract.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceContract  $serviceContract
     * @return mixed
     */
    public function restore(User $user, ServiceContract $serviceContract)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the service contract.
     *
     * @param  \App\User  $user
     * @param  \App\ServiceContract  $serviceContract
     * @return mixed
     */
    public function forceDelete(User $user, ServiceContract $serviceContract)
    {
        //
    }
}
