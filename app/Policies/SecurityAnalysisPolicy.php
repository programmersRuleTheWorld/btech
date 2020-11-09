<?php

namespace App\Policies;

use App\SecurityAnalysis;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SecurityAnalysisPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }
    /**
     * Determine whether the user can view any security analyses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the security analysis.
     *
     * @param  \App\User  $user
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return mixed
     */
    public function view(User $user, SecurityAnalysis $securityAnalysis)
    {
        //
    }

    /**
     * Determine whether the user can create security analyses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the security analysis.
     *
     * @param  \App\User  $user
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return mixed
     */
    public function update(User $user, SecurityAnalysis $securityAnalysis)
    {
        //
    }

    /**
     * Determine whether the user can delete the security analysis.
     *
     * @param  \App\User  $user
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return mixed
     */
    public function delete(User $user, SecurityAnalysis $securityAnalysis)
    {
        //
    }

    /**
     * Determine whether the user can restore the security analysis.
     *
     * @param  \App\User  $user
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return mixed
     */
    public function restore(User $user, SecurityAnalysis $securityAnalysis)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the security analysis.
     *
     * @param  \App\User  $user
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return mixed
     */
    public function forceDelete(User $user, SecurityAnalysis $securityAnalysis)
    {
        //
    }
}
