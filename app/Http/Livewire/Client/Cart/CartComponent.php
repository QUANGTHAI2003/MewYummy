<?php

namespace App\Http\Livewire\Client\Cart;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;

    protected $listeners = [
        'cartUpdated' => 'onCartUpdate'
    ];

    public function onCartUpdate()
    {
        $this->calculateDiscounts();
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponCode)
            ->where('expiry_date', '>=', Carbon::today())
            ->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        if (!$coupon) {
            session()->flash('coupon_message', 'Coupon code is invalid!');
            return;
        }

        session()->put('coupon', [
            'code'       => $coupon->code,
            'type'       => $coupon->type,
            'value'      => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function calculateDiscounts()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
            }

            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->totalAfterDiscount    = $this->subtotalAfterDiscount + Cart::instance('cart')->tax();
        }
    }

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
        if (session()->has('coupon')) {
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }
        $coupons = Coupon::all();
        return view('livewire.client.cart.cart-component', [
            'coupons' => $coupons
        ]);
    }
}
