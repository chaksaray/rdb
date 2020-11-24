<?php

namespace App\Policies;

use App\Policies\TrendingPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrendingPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the trendingPost can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the trendingPost can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrendingPost  $model
     * @return mixed
     */
    public function view(User $user, TrendingPost $model)
    {
        return true;
    }

    /**
     * Determine whether the trendingPost can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the trendingPost can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrendingPost  $model
     * @return mixed
     */
    public function update(User $user, TrendingPost $model)
    {
        return true;
    }

    /**
     * Determine whether the trendingPost can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrendingPost  $model
     * @return mixed
     */
    public function delete(User $user, TrendingPost $model)
    {
        return true;
    }

    /**
     * Determine whether the trendingPost can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrendingPost  $model
     * @return mixed
     */
    public function restore(User $user, TrendingPost $model)
    {
        return true;
    }

    /**
     * Determine whether the trendingPost can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TrendingPost  $model
     * @return mixed
     */
    public function forceDelete(User $user, TrendingPost $model)
    {
        return true;
    }
}
