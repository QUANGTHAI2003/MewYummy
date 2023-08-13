<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
Route::get('/address', function() {
    $address = Http::withHeaders([
        'Accept-Charset' => 'utf-8'
    ])->get('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json');

    return $address->json();
});
