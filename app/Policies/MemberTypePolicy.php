<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MemberType;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the memberType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list membertypes');
    }

    /**
     * Determine whether the memberType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MemberType  $model
     * @return mixed
     */
    public function view(User $user, MemberType $model)
    {
        return $user->hasPermissionTo('view membertypes');
    }

    /**
     * Determine whether the memberType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create membertypes');
    }

    /**
     * Determine whether the memberType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MemberType  $model
     * @return mixed
     */
    public function update(User $user, MemberType $model)
    {
        return $user->hasPermissionTo('update membertypes');
    }

    /**
     * Determine whether the memberType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MemberType  $model
     * @return mixed
     */
    public function delete(User $user, MemberType $model)
    {
        return $user->hasPermissionTo('delete membertypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MemberType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete membertypes');
    }

    /**
     * Determine whether the memberType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MemberType  $model
     * @return mixed
     */
    public function restore(User $user, MemberType $model)
    {
        return false;
    }

    /**
     * Determine whether the memberType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MemberType  $model
     * @return mixed
     */
    public function forceDelete(User $user, MemberType $model)
    {
        return false;
    }
}
