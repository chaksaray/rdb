<?php

namespace App\Policies;

use App\Policies\LogoutHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class LogoutHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the logoutHistory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the logoutHistory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LogoutHistory  $model
     * @return mixed
     */
    public function view(User $user, LogoutHistory $model)
    {
        return true;
    }

    /**
     * Determine whether the logoutHistory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the logoutHistory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LogoutHistory  $model
     * @return mixed
     */
    public function update(User $user, LogoutHistory $model)
    {
        return true;
    }

    /**
     * Determine whether the logoutHistory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LogoutHistory  $model
     * @return mixed
     */
    public function delete(User $user, LogoutHistory $model)
    {
        return true;
    }

    /**
     * Determine whether the logoutHistory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LogoutHistory  $model
     * @return mixed
     */
    public function restore(User $user, LogoutHistory $model)
    {
        return true;
    }

    /**
     * Determine whether the logoutHistory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LogoutHistory  $model
     * @return mixed
     */
    public function forceDelete(User $user, LogoutHistory $model)
    {
        return true;
    }
}
