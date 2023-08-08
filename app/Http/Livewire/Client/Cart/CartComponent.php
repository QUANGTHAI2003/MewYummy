<?php

namespace App\Http\Livewire\Client\Cart;

use Carbon\Carbon;
use App\Models\Coupon;
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

    public function checkout()
    {
        if (auth()->check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }

        if (session()->has('coupon')) {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'total'    => $this->totalAfterDiscount
            ]);
        } else {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'total'    => Cart::instance('cart')->total()
            ]);
        }
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

        $this->checkCouponWhenUpdateCart();

        $this->emit('cartUpdated');
    }

    public function decreaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        $qty  = $item->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);

        $this->checkCouponWhenUpdateCart();

        $this->emit('cartUpdated');
    }

    private function checkCouponWhenUpdateCart()
    {
        if (session()->has('coupon')) {
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }
    }

    public function deleteCartItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);

        $this->emit('cartUpdated');
    }

    public function render()
    {
        $this->checkCouponWhenUpdateCart();
        $coupons = Coupon::all();

        $this->setAmountForCheckout();

        return view('livewire.client.cart.cart-component', [
            'coupons' => $coupons
        ]);
    }
}
