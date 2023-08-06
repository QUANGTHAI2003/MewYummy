<?php

namespace App\Http\Livewire\Client\Checkout;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutComponent extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $note;
    public $payment_method;
    public $thankyou;

    protected $rules = [
        'name'           => 'required|min:6',
        'phone'          => 'required|min:10',
        'email'          => 'required|email',
        'address'        => 'required|min:6',
        'note'           => 'nullable',
        'payment_method' => 'required'
    ];

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
        $order->address      = $validatedData['address'];
        $order->note         = $validatedData['note'];
        $order->status       = 'pending';
        $order->sub_total    = session()->get('checkout')['subtotal'];
        $order->shipping_fee = 0;
        $order->discount     = session()->get('checkout')['discount'];
        $order->total_price  = session()->get('checkout')['total'];
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
        }

        $this->thankyou = 1;

        Cart::instance('cart')->destroy();
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
