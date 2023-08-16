<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('newuser.{id}', function ($user, $id){
    Log::info('router: newuser.' . $id);
    return (int) $user->id === (int) $id;
});

Broadcast::channel('order.{id}', function ($user, $id){
    Log::info('router: order.' . $id);
    return (int) $user->id === (int) $id;
});
