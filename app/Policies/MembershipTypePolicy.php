<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MembershipType;
use Illuminate\Auth\Access\HandlesAuthorization;

class MembershipTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the membershipType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list membershiptypes');
    }

    /**
     * Determine whether the membershipType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MembershipType  $model
     * @return mixed
     */
    public function view(User $user, MembershipType $model)
    {
        return $user->hasPermissionTo('view membershiptypes');
    }

    /**
     * Determine whether the membershipType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create membershiptypes');
    }

    /**
     * Determine whether the membershipType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MembershipType  $model
     * @return mixed
     */
    public function update(User $user, MembershipType $model)
    {
        return $user->hasPermissionTo('update membershiptypes');
    }

    /**
     * Determine whether the membershipType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MembershipType  $model
     * @return mixed
     */
    public function delete(User $user, MembershipType $model)
    {
        return $user->hasPermissionTo('delete membershiptypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MembershipType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete membershiptypes');
    }

    /**
     * Determine whether the membershipType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MembershipType  $model
     * @return mixed
     */
    public function restore(User $user, MembershipType $model)
    {
        return false;
    }

    /**
     * Determine whether the membershipType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MembershipType  $model
     * @return mixed
     */
    public function forceDelete(User $user, MembershipType $model)
    {
        return false;
    }
}
