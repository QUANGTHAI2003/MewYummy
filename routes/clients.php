<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\ProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('clients.pages.about');
})->name('about');

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'list'])->name('product');
    Route::get('/{id}', [ProductController::class, 'detail'])->name('detail');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/news', function () {
    return view('clients.pages.news');
})->name('news');

Route::get('/contact', function () {
    return view('clients.pages.contact');
})->name('contact');

Route::prefix('account')->name('account.')->group(function () {
    Route::get('/', [AccountController::class, 'profile'])->name('index');
    Route::get('/update-info', [AccountController::class, 'updateInfo'])->name('updateInfo');
    Route::get('/update-password', [AccountController::class, 'updatePassword'])
        ->name('updatePassword');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
