<?php

namespace App\Http\Livewire\Client\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{

    public function increaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        $qty  = $item->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('cartUpdated');
    }

    public function decreaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        $qty  = $item->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('cartUpdated');
    }

    public function deleteCartItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
    }

    public function render()
    {
        return view('livewire.client.cart.cart-component');
    }
}
