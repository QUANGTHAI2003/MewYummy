<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Database\Eloquent\Builder;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// get all users json
Route::get('/users', function (Request $request){
    return User::query()
               ->select('id', 'name', 'email')
               ->orderBy('name')
               ->when(
                   $request->search,
                   fn(Builder $query) => $query
                       ->where('name', 'like', "%{$request->search}%")
                       ->orWhere('email', 'like', "%{$request->search}%")
               )
               ->when(
                   $request->exists('selected'),
                   fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                   fn(Builder $query) => $query->limit(10)
               )
               ->get()
               ->map(function (User $user){
                   return $user;
               });
})->name('api.users.index');
