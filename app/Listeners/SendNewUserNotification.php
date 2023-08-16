<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;
use App\Events\NewUserRegister;

class SendNewUserNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $roles = Role::all()->pluck('name')->toArray();

        $admins = User::whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        })->get();

        foreach ($admins as $admin) {
            Notification::send($admin, new NewUserNotification($event->user));

            broadcast(new NewUserRegister($event->user))->toOthers();
        }
    }
}
