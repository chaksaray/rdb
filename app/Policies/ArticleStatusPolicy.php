<?php

namespace App\Policies;

use App\Policies\ArticleStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticleStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the articleStatus can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the articleStatus can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ArticleStatus  $model
     * @return mixed
     */
    public function view(User $user, ArticleStatus $model)
    {
        return true;
    }

    /**
     * Determine whether the articleStatus can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the articleStatus can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ArticleStatus  $model
     * @return mixed
     */
    public function update(User $user, ArticleStatus $model)
    {
        return true;
    }

    /**
     * Determine whether the articleStatus can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ArticleStatus  $model
     * @return mixed
     */
    public function delete(User $user, ArticleStatus $model)
    {
        return true;
    }

    /**
     * Determine whether the articleStatus can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ArticleStatus  $model
     * @return mixed
     */
    public function restore(User $user, ArticleStatus $model)
    {
        return true;
    }

    /**
     * Determine whether the articleStatus can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ArticleStatus  $model
     * @return mixed
     */
    public function forceDelete(User $user, ArticleStatus $model)
    {
        return true;
    }
}
