<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPassController;
use App\Http\Controllers\Client\ThankYouController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\Clients\CheckoutController;
use App\Http\Controllers\Client\Orders\OrderController;
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

Route::get('/news', function () {
    return view('clients.pages.news');
})->name('news');

Route::get('/contact', function () {
    return view('clients.pages.contact');
})->name('contact');

Route::prefix('account')->name('account.')->group(function () {
    Route::get('/', [AccountController::class, 'profile'])->name('index');
    Route::get('/update-info', [AccountController::class, 'updateInfo'])->name('updateInfo');
    Route::put('/update-info/{id}', [AccountController::class, 'postUpdateInfo'])->name('postUpdateInfo');
    Route::get('/update-password', [AccountController::class, 'updatePassword'])
        ->name('updatePassword');
    Route::put('/update-password/{id}', [AccountController::class, 'postUpdatePassword'])->name('postUpdatePassword');
    Route::get('orders/{id}', [OrderController::class, 'detail'])->name('order_detail');
    Route::get('/invoice/{orderId}', [OrderController::class, 'viewInvoice'])->name('viewInvoice');
    Route::get('/invoice/{orderId}/generate', [OrderController::class, 'generateInvoice'])->name('generateInvoice');
    Route::get('/accept-order/{orderId}/{token}', [OrderController::class, 'acceptOrder'])->name('acceptOrder');
    Route::get('/cancel-order/{orderId}', [OrderController::class, 'cancelOrder'])->name('cancelOrder');

    Route::post('/vnpay/{order}', [OrderController::class, 'vnpay_checkout'])->name('vnpay_checkout');
});


Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::get('thankyou', [ThankYouController::class, 'index'])->name('thankyou')->middleware('auth');

// Authentication routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('/forgot-password', [ForgotPassController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgot-password', [ForgotPassController::class, 'postForgotPassword'])->name('postForgotPassword');
Route::get('/reset-password/{token}', [ForgotPassController::class, 'resetPassword'])->name('resetPassword');
Route::post('/reset-password/{token}', [ForgotPassController::class, 'postResetPassword'])->name('postResetPassword');
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


Route::get('schedule', function() {
    Artisan::call('schedule:run');
});