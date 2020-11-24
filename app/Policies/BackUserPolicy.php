<?php

namespace App\Policies;

use App\Policies\BackUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class BackUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the backUser can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the backUser can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUser  $model
     * @return mixed
     */
    public function view(User $user, BackUser $model)
    {
        return true;
    }

    /**
     * Determine whether the backUser can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the backUser can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUser  $model
     * @return mixed
     */
    public function update(User $user, BackUser $model)
    {
        return true;
    }

    /**
     * Determine whether the backUser can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUser  $model
     * @return mixed
     */
    public function delete(User $user, BackUser $model)
    {
        return true;
    }

    /**
     * Determine whether the backUser can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUser  $model
     * @return mixed
     */
    public function restore(User $user, BackUser $model)
    {
        return true;
    }

    /**
     * Determine whether the backUser can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUser  $model
     * @return mixed
     */
    public function forceDelete(User $user, BackUser $model)
    {
        return true;
    }
}
