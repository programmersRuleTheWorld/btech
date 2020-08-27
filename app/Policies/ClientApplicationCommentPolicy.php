<?php

namespace App\Policies;

use App\ClientApplicationComment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientApplicationCommentPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view any client application comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the client application comment.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return mixed
     */
    public function view(User $user, ClientApplicationComment $clientApplicationComment)
    {
        //
    }

    /**
     * Determine whether the user can create client application comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the client application comment.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return mixed
     */
    public function update(User $user, ClientApplicationComment $clientApplicationComment)
    {
        //
    }

    /**
     * Determine whether the user can delete the client application comment.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return mixed
     */
    public function delete(User $user, ClientApplicationComment $clientApplicationComment)
    {
        //
    }

    /**
     * Determine whether the user can restore the client application comment.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return mixed
     */
    public function restore(User $user, ClientApplicationComment $clientApplicationComment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the client application comment.
     *
     * @param  \App\User  $user
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return mixed
     */
    public function forceDelete(User $user, ClientApplicationComment $clientApplicationComment)
    {
        //
    }
}
