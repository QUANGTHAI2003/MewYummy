<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\RoleManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\StaffManagementController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" middleware group. Now create something great!
|
 */

Route::prefix('admin')->middleware(['auth', 'checkIsAdmin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/products', ProductsController::class, ['except' => ['show', 'destroy']])
        ->names([
            'index'  => 'products',
            'create' => 'products.create',
            'store'  => 'products.store',
            'show'   => 'products.show',
            'edit'   => 'products.edit',
            'update' => 'products.update'
        ]);

    Route::resource('/categories', CategoriesController::class, ['except' => ['show', 'destroy']])
        ->names([
            'index'  => 'categories',
            'create' => 'categories.create',
            'store'  => 'categories.store',
            'edit'   => 'categories.edit',
            'update' => 'categories.update'
        ]);

    // authorizations
    Route::prefix('authorizations')->group(function () {
        Route::resource('users', UserManagementController::class)->except('show');
        Route::resource('roles', RoleManagementController::class)->except('show');
    Route::get('users/roles/{role}/permissions', [UserManagementController::class, 'getPermissions']);
    });

    Route::get('orders', function () {
        return view('admin.orders.index');
    })->name('orders');
});
