<?php

namespace App\Policies;

use App\Policies\Toptic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopticPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the toptic can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the toptic can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Toptic  $model
     * @return mixed
     */
    public function view(User $user, Toptic $model)
    {
        return true;
    }

    /**
     * Determine whether the toptic can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the toptic can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Toptic  $model
     * @return mixed
     */
    public function update(User $user, Toptic $model)
    {
        return true;
    }

    /**
     * Determine whether the toptic can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Toptic  $model
     * @return mixed
     */
    public function delete(User $user, Toptic $model)
    {
        return true;
    }

    /**
     * Determine whether the toptic can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Toptic  $model
     * @return mixed
     */
    public function restore(User $user, Toptic $model)
    {
        return true;
    }

    /**
     * Determine whether the toptic can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Toptic  $model
     * @return mixed
     */
    public function forceDelete(User $user, Toptic $model)
    {
        return true;
    }
}
