<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Models\User;
use App\Notifications\InvoicePaidNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class SendInvoicePaidNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        $roles = Role::all()->pluck('name')->toArray();

        $admins = User::whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles);
        })->get();

        foreach ($admins as $admin) {
            Notification::send($admin, new InvoicePaidNotification($event->order));
        }
    }
}
