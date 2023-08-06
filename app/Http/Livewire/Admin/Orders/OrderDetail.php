<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderDetail extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function render()
    {
        $order = Order::with(['orderItems'])->where('id', $this->orderId)->first();
        return view('livewire.admin.orders.order-detail', compact('order'));
    }
}
