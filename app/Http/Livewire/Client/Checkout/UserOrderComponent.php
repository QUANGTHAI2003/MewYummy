<?php

namespace App\Http\Livewire\Client\Checkout;

use App\Models\Order;
use Livewire\Component;

class UserOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::with('transaction')->where('user_id', auth()->user()->id)->paginate(12);
        return view('livewire.client.checkout.user-order-component', compact('orders'));
    }
}
