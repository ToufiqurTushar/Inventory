<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FoodOrder;
use Illuminate\Auth\Access\HandlesAuthorization;

class FoodOrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the foodOrder can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list foodorders');
    }

    /**
     * Determine whether the foodOrder can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodOrder  $model
     * @return mixed
     */
    public function view(User $user, FoodOrder $model)
    {
        return $user->hasPermissionTo('view foodorders');
    }

    /**
     * Determine whether the foodOrder can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create foodorders');
    }

    /**
     * Determine whether the foodOrder can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodOrder  $model
     * @return mixed
     */
    public function update(User $user, FoodOrder $model)
    {
        return $user->hasPermissionTo('update foodorders');
    }

    /**
     * Determine whether the foodOrder can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodOrder  $model
     * @return mixed
     */
    public function delete(User $user, FoodOrder $model)
    {
        return $user->hasPermissionTo('delete foodorders');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodOrder  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete foodorders');
    }

    /**
     * Determine whether the foodOrder can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodOrder  $model
     * @return mixed
     */
    public function restore(User $user, FoodOrder $model)
    {
        return false;
    }

    /**
     * Determine whether the foodOrder can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodOrder  $model
     * @return mixed
     */
    public function forceDelete(User $user, FoodOrder $model)
    {
        return false;
    }
}
