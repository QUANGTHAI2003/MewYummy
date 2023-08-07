<?php

namespace App\Http\Livewire\Client\Checkout;

use App\Models\Order;
use Livewire\Component;

class OrderCountComponent extends Component
{
    public function render()
    {
        $order_count = Order::where('user_id', auth()->user()->id)->count();
        return view('livewire.client.checkout.order-count-component', compact('order_count'));
    }
}
