<?php

namespace App\Policies;

use App\AffiliateCampaign;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AffiliateCampaignPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view any affiliate campaigns.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the affiliate campaign.
     *
     * @param  \App\User  $user
     * @param  \App\AffiliateCampaign  $affiliateCampaign
     * @return mixed
     */
    public function view(User $user, AffiliateCampaign $affiliateCampaign)
    {
        return $user->getPermission('show-affiliate-campaign') && $affiliateCampaign->affiliate_id == $user->affiliate_id;
    }

    /**
     * Determine whether the user can create affiliate campaigns.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the affiliate campaign.
     *
     * @param  \App\User  $user
     * @param  \App\AffiliateCampaign  $affiliateCampaign
     * @return mixed
     */
    public function update(User $user, AffiliateCampaign $affiliateCampaign)
    {
        return $user->getPermission('update-affiliate-campaign');
    }

    /**
     * Determine whether the user can delete the affiliate campaign.
     *
     * @param  \App\User  $user
     * @param  \App\AffiliateCampaign  $affiliateCampaign
     * @return mixed
     */
    public function delete(User $user, AffiliateCampaign $affiliateCampaign)
    {
        
    }

    /**
     * Determine whether the user can restore the affiliate campaign.
     *
     * @param  \App\User  $user
     * @param  \App\AffiliateCampaign  $affiliateCampaign
     * @return mixed
     */
    public function restore(User $user, AffiliateCampaign $affiliateCampaign)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the affiliate campaign.
     *
     * @param  \App\User  $user
     * @param  \App\AffiliateCampaign  $affiliateCampaign
     * @return mixed
     */
    public function forceDelete(User $user, AffiliateCampaign $affiliateCampaign)
    {
        //
    }
}
