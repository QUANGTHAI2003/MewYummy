<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/products', ProductsController::class, ['except' => ['show', 'destroy']])
        ->names([
            'index'   => 'products',
            'create'  => 'products.create',
            'store'   => 'products.store',
            'show'    => 'products.show',
            'edit'    => 'products.edit',
            'update'  => 'products.update',
        ]);

    Route::resource('/categories', CategoriesController::class, ['except' => ['show', 'destroy']])
        ->names([
            'index'   => 'categories',
            'create'  => 'categories.create',
            'store'   => 'categories.store',
            'edit'    => 'categories.edit',
            'update'  => 'categories.update',
        ]);

    // authorizations
    Route::prefix('authorizations')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AuthorizationsController::class, 'index'])->name('authorizations.index');
        Route::get('/{user}/edit', [\App\Http\Controllers\Admin\AuthorizationsController::class, 'edit'])->name('authorizations.edit');
        Route::put('/{user}', [\App\Http\Controllers\Admin\AuthorizationsController::class, 'update'])->name('authorizations.update');
    });

    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users');

    Route::get('orders', function () {
        return view('admin.orders.index');
    })->name('orders');
});

Route::post('/tmp-upload', [ProductsController::class, 'tmpUpload']);
Route::delete('/tmp-delete', [ProductsController::class, 'tmpDelete']);
