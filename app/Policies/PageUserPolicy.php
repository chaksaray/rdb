<?php

namespace App\Policies;

use App\Policies\PageUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class PageUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pageUser can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the pageUser can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageUser  $model
     * @return mixed
     */
    public function view(User $user, PageUser $model)
    {
        return true;
    }

    /**
     * Determine whether the pageUser can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the pageUser can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageUser  $model
     * @return mixed
     */
    public function update(User $user, PageUser $model)
    {
        return true;
    }

    /**
     * Determine whether the pageUser can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageUser  $model
     * @return mixed
     */
    public function delete(User $user, PageUser $model)
    {
        return true;
    }

    /**
     * Determine whether the pageUser can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageUser  $model
     * @return mixed
     */
    public function restore(User $user, PageUser $model)
    {
        return true;
    }

    /**
     * Determine whether the pageUser can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageUser  $model
     * @return mixed
     */
    public function forceDelete(User $user, PageUser $model)
    {
        return true;
    }
}
