<?php

namespace App\Policies;

use App\SupportTicketComment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportTicketCommentsPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view any support ticket comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the support ticket comment.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return mixed
     */
    public function view(User $user, SupportTicketComment $supportTicketComment)
    {
        return $user->getPermission('show-support-ticket-comment');
    }

    /**
     * Determine whether the user can create support ticket comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->getPermission('store-support-ticket-comment');
    }

    /**
     * Determine whether the user can update the support ticket comment.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return mixed
     */
    public function update(User $user, SupportTicketComment $supportTicketComment)
    {
        //
    }

    /**
     * Determine whether the user can delete the support ticket comment.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return mixed
     */
    public function delete(User $user, SupportTicketComment $supportTicketComment)
    {
        //
    }

    /**
     * Determine whether the user can restore the support ticket comment.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return mixed
     */
    public function restore(User $user, SupportTicketComment $supportTicketComment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the support ticket comment.
     *
     * @param  \App\User  $user
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return mixed
     */
    public function forceDelete(User $user, SupportTicketComment $supportTicketComment)
    {
        //
    }
}
