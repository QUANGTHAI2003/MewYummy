<?php

namespace App\Http\Livewire\Client\Cart;

use Livewire\Component;

class CartCountComponent extends Component
{
    protected $listeners = [
        'cartUpdated' => 'render'
    ];

    public function render()
    {
        return view('livewire.client.cart.cart-count-component');
    }
}
