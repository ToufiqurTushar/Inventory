<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the member can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list members');
    }

    /**
     * Determine whether the member can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Member  $model
     * @return mixed
     */
    public function view(User $user, Member $model)
    {
        return $user->hasPermissionTo('view members');
    }

    /**
     * Determine whether the member can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create members');
    }

    /**
     * Determine whether the member can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Member  $model
     * @return mixed
     */
    public function update(User $user, Member $model)
    {
        return $user->hasPermissionTo('update members');
    }

    /**
     * Determine whether the member can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Member  $model
     * @return mixed
     */
    public function delete(User $user, Member $model)
    {
        return $user->hasPermissionTo('delete members');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Member  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete members');
    }

    /**
     * Determine whether the member can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Member  $model
     * @return mixed
     */
    public function restore(User $user, Member $model)
    {
        return false;
    }

    /**
     * Determine whether the member can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Member  $model
     * @return mixed
     */
    public function forceDelete(User $user, Member $model)
    {
        return false;
    }
}
