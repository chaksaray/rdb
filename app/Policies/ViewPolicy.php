<?php

namespace App\Policies;

use App\Policies\View;
use Illuminate\Auth\Access\HandlesAuthorization;

class ViewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the view can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the view can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\View  $model
     * @return mixed
     */
    public function view(User $user, View $model)
    {
        return true;
    }

    /**
     * Determine whether the view can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the view can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\View  $model
     * @return mixed
     */
    public function update(User $user, View $model)
    {
        return true;
    }

    /**
     * Determine whether the view can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\View  $model
     * @return mixed
     */
    public function delete(User $user, View $model)
    {
        return true;
    }

    /**
     * Determine whether the view can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\View  $model
     * @return mixed
     */
    public function restore(User $user, View $model)
    {
        return true;
    }

    /**
     * Determine whether the view can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\View  $model
     * @return mixed
     */
    public function forceDelete(User $user, View $model)
    {
        return true;
    }
}
