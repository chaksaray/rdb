<?php

namespace App\Policies;

use App\Policies\FollowAuthor;
use Illuminate\Auth\Access\HandlesAuthorization;

class FollowAuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the followAuthor can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the followAuthor can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowAuthor  $model
     * @return mixed
     */
    public function view(User $user, FollowAuthor $model)
    {
        return true;
    }

    /**
     * Determine whether the followAuthor can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the followAuthor can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowAuthor  $model
     * @return mixed
     */
    public function update(User $user, FollowAuthor $model)
    {
        return true;
    }

    /**
     * Determine whether the followAuthor can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowAuthor  $model
     * @return mixed
     */
    public function delete(User $user, FollowAuthor $model)
    {
        return true;
    }

    /**
     * Determine whether the followAuthor can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowAuthor  $model
     * @return mixed
     */
    public function restore(User $user, FollowAuthor $model)
    {
        return true;
    }

    /**
     * Determine whether the followAuthor can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowAuthor  $model
     * @return mixed
     */
    public function forceDelete(User $user, FollowAuthor $model)
    {
        return true;
    }
}
