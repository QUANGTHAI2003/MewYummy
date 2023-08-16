<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StatisticChartComponent extends Component
{
    public $notifications;

    public function getListeners()
    {
        return [
            "echo-private:newuser." . Auth::user()->id . ",NewUserRegister" => 'handleNewNotification',
        ];
    }

    public function handleNewNotification($notification)
    {
        $this->notifications->prepend($notification);

        if ($this->notifications->count() > 10) {
            $this->notifications->pop();
        }
    }

    public function mount()
    {
        $this->notifications = auth()->user()->unreadNotifications->take(10);
    }

    public function render()
    {
        return view('livewire.admin.dashboard.statistic-chart-component', [
            'notifications' => $this->notifications
        ]);
    }
}
