<?php

namespace App\Policies;

use App\Policies\AccountType;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accountType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the accountType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AccountType  $model
     * @return mixed
     */
    public function view(User $user, AccountType $model)
    {
        return true;
    }

    /**
     * Determine whether the accountType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the accountType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AccountType  $model
     * @return mixed
     */
    public function update(User $user, AccountType $model)
    {
        return true;
    }

    /**
     * Determine whether the accountType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AccountType  $model
     * @return mixed
     */
    public function delete(User $user, AccountType $model)
    {
        return true;
    }

    /**
     * Determine whether the accountType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AccountType  $model
     * @return mixed
     */
    public function restore(User $user, AccountType $model)
    {
        return true;
    }

    /**
     * Determine whether the accountType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AccountType  $model
     * @return mixed
     */
    public function forceDelete(User $user, AccountType $model)
    {
        return true;
    }
}
