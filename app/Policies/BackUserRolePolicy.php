<?php

namespace App\Policies;

use App\Policies\BackUserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class BackUserRolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the backUserRole can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the backUserRole can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUserRole  $model
     * @return mixed
     */
    public function view(User $user, BackUserRole $model)
    {
        return true;
    }

    /**
     * Determine whether the backUserRole can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the backUserRole can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUserRole  $model
     * @return mixed
     */
    public function update(User $user, BackUserRole $model)
    {
        return true;
    }

    /**
     * Determine whether the backUserRole can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUserRole  $model
     * @return mixed
     */
    public function delete(User $user, BackUserRole $model)
    {
        return true;
    }

    /**
     * Determine whether the backUserRole can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUserRole  $model
     * @return mixed
     */
    public function restore(User $user, BackUserRole $model)
    {
        return true;
    }

    /**
     * Determine whether the backUserRole can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\BackUserRole  $model
     * @return mixed
     */
    public function forceDelete(User $user, BackUserRole $model)
    {
        return true;
    }
}
