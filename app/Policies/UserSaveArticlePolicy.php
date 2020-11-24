<?php

namespace App\Policies;

use App\Policies\UserSaveArticle;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSaveArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the userSaveArticle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the userSaveArticle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSaveArticle  $model
     * @return mixed
     */
    public function view(User $user, UserSaveArticle $model)
    {
        return true;
    }

    /**
     * Determine whether the userSaveArticle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the userSaveArticle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSaveArticle  $model
     * @return mixed
     */
    public function update(User $user, UserSaveArticle $model)
    {
        return true;
    }

    /**
     * Determine whether the userSaveArticle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSaveArticle  $model
     * @return mixed
     */
    public function delete(User $user, UserSaveArticle $model)
    {
        return true;
    }

    /**
     * Determine whether the userSaveArticle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSaveArticle  $model
     * @return mixed
     */
    public function restore(User $user, UserSaveArticle $model)
    {
        return true;
    }

    /**
     * Determine whether the userSaveArticle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSaveArticle  $model
     * @return mixed
     */
    public function forceDelete(User $user, UserSaveArticle $model)
    {
        return true;
    }
}
