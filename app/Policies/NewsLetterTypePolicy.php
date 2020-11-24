<?php

namespace App\Policies;

use App\Policies\NewsLetterType;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsLetterTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the newsLetterType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the newsLetterType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NewsLetterType  $model
     * @return mixed
     */
    public function view(User $user, NewsLetterType $model)
    {
        return true;
    }

    /**
     * Determine whether the newsLetterType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the newsLetterType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NewsLetterType  $model
     * @return mixed
     */
    public function update(User $user, NewsLetterType $model)
    {
        return true;
    }

    /**
     * Determine whether the newsLetterType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NewsLetterType  $model
     * @return mixed
     */
    public function delete(User $user, NewsLetterType $model)
    {
        return true;
    }

    /**
     * Determine whether the newsLetterType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NewsLetterType  $model
     * @return mixed
     */
    public function restore(User $user, NewsLetterType $model)
    {
        return true;
    }

    /**
     * Determine whether the newsLetterType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NewsLetterType  $model
     * @return mixed
     */
    public function forceDelete(User $user, NewsLetterType $model)
    {
        return true;
    }
}
