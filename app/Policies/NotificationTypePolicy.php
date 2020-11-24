<?php

namespace App\Policies;

use App\Policies\NotificationType;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the notificationType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the notificationType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NotificationType  $model
     * @return mixed
     */
    public function view(User $user, NotificationType $model)
    {
        return true;
    }

    /**
     * Determine whether the notificationType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the notificationType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NotificationType  $model
     * @return mixed
     */
    public function update(User $user, NotificationType $model)
    {
        return true;
    }

    /**
     * Determine whether the notificationType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NotificationType  $model
     * @return mixed
     */
    public function delete(User $user, NotificationType $model)
    {
        return true;
    }

    /**
     * Determine whether the notificationType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NotificationType  $model
     * @return mixed
     */
    public function restore(User $user, NotificationType $model)
    {
        return true;
    }

    /**
     * Determine whether the notificationType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\NotificationType  $model
     * @return mixed
     */
    public function forceDelete(User $user, NotificationType $model)
    {
        return true;
    }
}
