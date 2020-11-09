<?php

namespace App\Policies;

use App\SupportTicket;
use App\User;
use App\Operation;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportTicketPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }
    
    /**
     * Determine whether the user can view any support tickets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the support ticket.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicket  $supportTicket
     * @return mixed
     */
    public function view(User $user, SupportTicket $supportTicket)
    {
        return $user->getPermission('show-support-ticket');
    }

    /**
     * Determine whether the user can create support tickets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->getPermission('store-support-ticket');
    }

    /**
     * Determine whether the user can update the support ticket.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicket  $supportTicket
     * @return mixed
     */
    public function update(User $user, SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Determine whether the user can delete the support ticket.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicket  $supportTicket
     * @return mixed
     */
    public function delete(User $user, SupportTicket $supportTicket)
    {
        //
    }

    public function isComplete(User $user)
    {
        return $user->getPermission('change-support-ticket-status');
    }

    /**
     * Determine whether the user can restore the support ticket.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicket  $supportTicket
     * @return mixed
     */
    public function restore(User $user, SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the support ticket.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicket  $supportTicket
     * @return mixed
     */
    public function forceDelete(User $user, SupportTicket $supportTicket)
    {
        //
    }
}
