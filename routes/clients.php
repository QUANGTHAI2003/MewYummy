<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\ProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    Route::get('/collections', [ProductController::class, 'index'])->name('product');
    Route::get('/{slug}-p{id}.html', [ProductController::class, 'show'])->name('show')
    ->where(['slug' => '[a-z0-9-]+', 'id' => '[0-9]+']);
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

// Authentication routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback'])
    ->name('login.google.callback');

Route::get('/login/facebook', [LoginController::class, 'redirectToFacebook'])
    ->name('login.facebook');
Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookCallback'])
    ->name('login.facebook.callback');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
