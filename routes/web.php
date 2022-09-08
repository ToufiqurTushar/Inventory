<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\FoodEntryController;
use App\Http\Controllers\FoodOrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MembershipTypeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth'])->name('dashboard');


Route::prefix('/')->middleware('auth')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('food-entries', FoodEntryController::class);
    Route::resource('food-orders', FoodOrderController::class);
    Route::resource('members', MemberController::class);
    Route::resource('membership-types', MembershipTypeController::class);
    Route::resource('stocks-in', StockInController::class);
});
