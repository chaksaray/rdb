<?php

namespace App\Policies;

use App\Policies\LoginHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoginHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the loginHistory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the loginHistory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LoginHistory  $model
     * @return mixed
     */
    public function view(User $user, LoginHistory $model)
    {
        return true;
    }

    /**
     * Determine whether the loginHistory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the loginHistory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LoginHistory  $model
     * @return mixed
     */
    public function update(User $user, LoginHistory $model)
    {
        return true;
    }

    /**
     * Determine whether the loginHistory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LoginHistory  $model
     * @return mixed
     */
    public function delete(User $user, LoginHistory $model)
    {
        return true;
    }

    /**
     * Determine whether the loginHistory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LoginHistory  $model
     * @return mixed
     */
    public function restore(User $user, LoginHistory $model)
    {
        return true;
    }

    /**
     * Determine whether the loginHistory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\LoginHistory  $model
     * @return mixed
     */
    public function forceDelete(User $user, LoginHistory $model)
    {
        return true;
    }
}
