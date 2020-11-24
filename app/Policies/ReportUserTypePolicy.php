<?php

namespace App\Policies;

use App\Policies\ReportUserType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportUserTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the reportUserType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the reportUserType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReportUserType  $model
     * @return mixed
     */
    public function view(User $user, ReportUserType $model)
    {
        return true;
    }

    /**
     * Determine whether the reportUserType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the reportUserType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReportUserType  $model
     * @return mixed
     */
    public function update(User $user, ReportUserType $model)
    {
        return true;
    }

    /**
     * Determine whether the reportUserType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReportUserType  $model
     * @return mixed
     */
    public function delete(User $user, ReportUserType $model)
    {
        return true;
    }

    /**
     * Determine whether the reportUserType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReportUserType  $model
     * @return mixed
     */
    public function restore(User $user, ReportUserType $model)
    {
        return true;
    }

    /**
     * Determine whether the reportUserType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReportUserType  $model
     * @return mixed
     */
    public function forceDelete(User $user, ReportUserType $model)
    {
        return true;
    }
}
