<?php

namespace App\Http\Livewire\Client\Checkout;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Events\NewOrder;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Mail\Order\OrderShipped;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutComponent extends Component
{
    public $name;
    public $phone;
    public $email;
    public $city;
    public $district;
    public $ward;
    public $address;
    public $note;
    public $payment_method = 'cod';
    public $thankyou;

    protected $rules = [
        'name'           => 'required|min:6',
        'phone'          => 'required|min:10',
        'email'          => 'required|email',
        'address'        => 'required|min:6',
        'note'           => 'nullable',
        'payment_method' => 'required'
    ];

    public function mount()
    {
        if (Auth::check()) {
            $this->name    = Auth::user()->name;
            $this->phone   = Auth::user()->phone_number;
            $this->email   = Auth::user()->email;
            $this->address = Auth::user()->address;
        }

        $this->thankyou = false;
    }

    public function selectAddress()
    {
        $this->address = $this->ward . ' - ' . $this->district . ' - ' . $this->city;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function placeOrder()
    {
        $validatedData       = $this->validate();
        $order               = new Order();
        $order->user_id      = Auth::user()->id;
        $order->name         = $validatedData['name'];
        $order->phone        = $validatedData['phone'];
        $order->email        = $validatedData['email'];
        $order->address      = $this->address ?: auth()->user()->address;
        $order->note         = $validatedData['note'];
        $order->status       = 'pending';
        $order->sub_total    = session()->get('checkout')['subtotal'];
        $order->shipping_fee = 0;
        $order->discount     = session()->get('checkout')['discount'];
        $order->total_price  = session()->get('checkout')['total'];
        $order->token        = uniqid() . time() . $order->user_id;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem                   = new OrderItem();
            $orderItem->order_id         = $order->id;
            $orderItem->product_id       = $item->model->id;
            $orderItem->product_name     = $item->name;
            $orderItem->product_quantity = $item->qty;
            $orderItem->product_price    = $item->price;
            $orderItem->product_image    = $item->options->image;
            $orderItem->save();

            $product = Product::find($item->model->id);
            $product->stock_qty -= $item->qty;
            $product->save();
        }

        if ($this->payment_method == 'cod') {
            $transaction           = new Transaction();
            $transaction->user_id  = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->type     = $this->payment_method;
            $transaction->status   = 'pending';
            $transaction->save();
        } else if ($this->payment_method == 'vnpay') {
            // return redirect()->route('vnpay_checkout', $order);
        }

        // get current order
        $order = Order::find($order->id);

        Mail::to($order->email)->send(new OrderShipped($order));
        event(new NewOrder($order));
        $this->thankyou = 1;

        Cart::instance('cart')->destroy();
        session()->forget('coupon');
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou == 1) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.client.checkout.checkout-component');
    }
}
