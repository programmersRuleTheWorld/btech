<?php

namespace App\Policies;

use App\Repo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepoPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }
    
    /**
     * Determine whether the user can view any repos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the repo.
     *
     * @param  \App\User  $user
     * @param  \App\Repo  $repo
     * @return mixed
     */
    public function view(User $user, Repo $repo)
    {
        //
    }

    /**
     * Determine whether the user can create repos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the repo.
     *
     * @param  \App\User  $user
     * @param  \App\Repo  $repo
     * @return mixed
     */
    public function update(User $user, Repo $repo)
    {
        //
    }

    /**
     * Determine whether the user can delete the repo.
     *
     * @param  \App\User  $user
     * @param  \App\Repo  $repo
     * @return mixed
     */
    public function delete(User $user, Repo $repo)
    {
        //
    }

    /**
     * Determine whether the user can restore the repo.
     *
     * @param  \App\User  $user
     * @param  \App\Repo  $repo
     * @return mixed
     */
    public function restore(User $user, Repo $repo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the repo.
     *
     * @param  \App\User  $user
     * @param  \App\Repo  $repo
     * @return mixed
     */
    public function forceDelete(User $user, Repo $repo)
    {
        //
    }
}
