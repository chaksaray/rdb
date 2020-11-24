<?php

namespace App\Policies;

use App\Policies\FollowTopic;
use Illuminate\Auth\Access\HandlesAuthorization;

class FollowTopicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the followTopic can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the followTopic can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowTopic  $model
     * @return mixed
     */
    public function view(User $user, FollowTopic $model)
    {
        return true;
    }

    /**
     * Determine whether the followTopic can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the followTopic can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowTopic  $model
     * @return mixed
     */
    public function update(User $user, FollowTopic $model)
    {
        return true;
    }

    /**
     * Determine whether the followTopic can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowTopic  $model
     * @return mixed
     */
    public function delete(User $user, FollowTopic $model)
    {
        return true;
    }

    /**
     * Determine whether the followTopic can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowTopic  $model
     * @return mixed
     */
    public function restore(User $user, FollowTopic $model)
    {
        return true;
    }

    /**
     * Determine whether the followTopic can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FollowTopic  $model
     * @return mixed
     */
    public function forceDelete(User $user, FollowTopic $model)
    {
        return true;
    }
}
