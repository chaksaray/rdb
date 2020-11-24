<?php

namespace App\Policies;

use App\Policies\Gender;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the gender can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the gender can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gender  $model
     * @return mixed
     */
    public function view(User $user, Gender $model)
    {
        return true;
    }

    /**
     * Determine whether the gender can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the gender can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gender  $model
     * @return mixed
     */
    public function update(User $user, Gender $model)
    {
        return true;
    }

    /**
     * Determine whether the gender can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gender  $model
     * @return mixed
     */
    public function delete(User $user, Gender $model)
    {
        return true;
    }

    /**
     * Determine whether the gender can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gender  $model
     * @return mixed
     */
    public function restore(User $user, Gender $model)
    {
        return true;
    }

    /**
     * Determine whether the gender can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gender  $model
     * @return mixed
     */
    public function forceDelete(User $user, Gender $model)
    {
        return true;
    }
}
