<?php

namespace App\Policies;

use App\Policies\FreqAskQuestion;
use Illuminate\Auth\Access\HandlesAuthorization;

class FreqAskQuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the freqAskQuestion can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the freqAskQuestion can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FreqAskQuestion  $model
     * @return mixed
     */
    public function view(User $user, FreqAskQuestion $model)
    {
        return true;
    }

    /**
     * Determine whether the freqAskQuestion can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the freqAskQuestion can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FreqAskQuestion  $model
     * @return mixed
     */
    public function update(User $user, FreqAskQuestion $model)
    {
        return true;
    }

    /**
     * Determine whether the freqAskQuestion can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FreqAskQuestion  $model
     * @return mixed
     */
    public function delete(User $user, FreqAskQuestion $model)
    {
        return true;
    }

    /**
     * Determine whether the freqAskQuestion can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FreqAskQuestion  $model
     * @return mixed
     */
    public function restore(User $user, FreqAskQuestion $model)
    {
        return true;
    }

    /**
     * Determine whether the freqAskQuestion can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FreqAskQuestion  $model
     * @return mixed
     */
    public function forceDelete(User $user, FreqAskQuestion $model)
    {
        return true;
    }
}
