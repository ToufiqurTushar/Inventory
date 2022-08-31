<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StockIn;
use Illuminate\Auth\Access\HandlesAuthorization;

class StockInPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the stockIn can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list stocksin');
    }

    /**
     * Determine whether the stockIn can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockIn  $model
     * @return mixed
     */
    public function view(User $user, StockIn $model)
    {
        return $user->hasPermissionTo('view stocksin');
    }

    /**
     * Determine whether the stockIn can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create stocksin');
    }

    /**
     * Determine whether the stockIn can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockIn  $model
     * @return mixed
     */
    public function update(User $user, StockIn $model)
    {
        return $user->hasPermissionTo('update stocksin');
    }

    /**
     * Determine whether the stockIn can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockIn  $model
     * @return mixed
     */
    public function delete(User $user, StockIn $model)
    {
        return $user->hasPermissionTo('delete stocksin');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockIn  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete stocksin');
    }

    /**
     * Determine whether the stockIn can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockIn  $model
     * @return mixed
     */
    public function restore(User $user, StockIn $model)
    {
        return false;
    }

    /**
     * Determine whether the stockIn can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockIn  $model
     * @return mixed
     */
    public function forceDelete(User $user, StockIn $model)
    {
        return false;
    }
}
