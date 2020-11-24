<?php

namespace App\Policies;

use App\Policies\PaymentMethod;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentMethodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the paymentMethod can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the paymentMethod can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentMethod  $model
     * @return mixed
     */
    public function view(User $user, PaymentMethod $model)
    {
        return true;
    }

    /**
     * Determine whether the paymentMethod can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the paymentMethod can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentMethod  $model
     * @return mixed
     */
    public function update(User $user, PaymentMethod $model)
    {
        return true;
    }

    /**
     * Determine whether the paymentMethod can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentMethod  $model
     * @return mixed
     */
    public function delete(User $user, PaymentMethod $model)
    {
        return true;
    }

    /**
     * Determine whether the paymentMethod can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentMethod  $model
     * @return mixed
     */
    public function restore(User $user, PaymentMethod $model)
    {
        return true;
    }

    /**
     * Determine whether the paymentMethod can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentMethod  $model
     * @return mixed
     */
    public function forceDelete(User $user, PaymentMethod $model)
    {
        return true;
    }
}
