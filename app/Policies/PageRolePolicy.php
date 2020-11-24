<?php

namespace App\Policies;

use App\Policies\PageRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class PageRolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pageRole can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the pageRole can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageRole  $model
     * @return mixed
     */
    public function view(User $user, PageRole $model)
    {
        return true;
    }

    /**
     * Determine whether the pageRole can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the pageRole can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageRole  $model
     * @return mixed
     */
    public function update(User $user, PageRole $model)
    {
        return true;
    }

    /**
     * Determine whether the pageRole can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageRole  $model
     * @return mixed
     */
    public function delete(User $user, PageRole $model)
    {
        return true;
    }

    /**
     * Determine whether the pageRole can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageRole  $model
     * @return mixed
     */
    public function restore(User $user, PageRole $model)
    {
        return true;
    }

    /**
     * Determine whether the pageRole can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PageRole  $model
     * @return mixed
     */
    public function forceDelete(User $user, PageRole $model)
    {
        return true;
    }
}
