<?php

namespace App\Policies;

use App\Policies\Share;
use Illuminate\Auth\Access\HandlesAuthorization;

class SharePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the share can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the share can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Share  $model
     * @return mixed
     */
    public function view(User $user, Share $model)
    {
        return true;
    }

    /**
     * Determine whether the share can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the share can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Share  $model
     * @return mixed
     */
    public function update(User $user, Share $model)
    {
        return true;
    }

    /**
     * Determine whether the share can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Share  $model
     * @return mixed
     */
    public function delete(User $user, Share $model)
    {
        return true;
    }

    /**
     * Determine whether the share can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Share  $model
     * @return mixed
     */
    public function restore(User $user, Share $model)
    {
        return true;
    }

    /**
     * Determine whether the share can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Share  $model
     * @return mixed
     */
    public function forceDelete(User $user, Share $model)
    {
        return true;
    }
}
