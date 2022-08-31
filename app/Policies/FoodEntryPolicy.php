<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FoodEntry;
use Illuminate\Auth\Access\HandlesAuthorization;

class FoodEntryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the foodEntry can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list foodentries');
    }

    /**
     * Determine whether the foodEntry can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodEntry  $model
     * @return mixed
     */
    public function view(User $user, FoodEntry $model)
    {
        return $user->hasPermissionTo('view foodentries');
    }

    /**
     * Determine whether the foodEntry can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create foodentries');
    }

    /**
     * Determine whether the foodEntry can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodEntry  $model
     * @return mixed
     */
    public function update(User $user, FoodEntry $model)
    {
        return $user->hasPermissionTo('update foodentries');
    }

    /**
     * Determine whether the foodEntry can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodEntry  $model
     * @return mixed
     */
    public function delete(User $user, FoodEntry $model)
    {
        return $user->hasPermissionTo('delete foodentries');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodEntry  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete foodentries');
    }

    /**
     * Determine whether the foodEntry can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodEntry  $model
     * @return mixed
     */
    public function restore(User $user, FoodEntry $model)
    {
        return false;
    }

    /**
     * Determine whether the foodEntry can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FoodEntry  $model
     * @return mixed
     */
    public function forceDelete(User $user, FoodEntry $model)
    {
        return false;
    }
}
