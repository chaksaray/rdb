<?php

namespace App\Policies;

use App\Policies\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the page can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the page can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Page  $model
     * @return mixed
     */
    public function view(User $user, Page $model)
    {
        return true;
    }

    /**
     * Determine whether the page can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the page can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Page  $model
     * @return mixed
     */
    public function update(User $user, Page $model)
    {
        return true;
    }

    /**
     * Determine whether the page can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Page  $model
     * @return mixed
     */
    public function delete(User $user, Page $model)
    {
        return true;
    }

    /**
     * Determine whether the page can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Page  $model
     * @return mixed
     */
    public function restore(User $user, Page $model)
    {
        return true;
    }

    /**
     * Determine whether the page can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Page  $model
     * @return mixed
     */
    public function forceDelete(User $user, Page $model)
    {
        return true;
    }
}
