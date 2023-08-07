<?php

namespace App\Http\Controllers\Client\Orders;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Mail\Order\OrderShipped;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function detail($id)
    {
        $order = Order::with('transaction', 'orderItems')->where('id', $id)->first();
        return view('clients.account.order_detail', compact('order'));
    }

    public function viewInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('clients.account.invoice', compact('order'));
    }

    public function generateInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);

        $pdf = Pdf::loadView('clients.account.invoice', compact('order'));

        set_time_limit(300);
        return $pdf->download('invoice.pdf');
    }

    public function acceptOrder($orderId, $token)
    {
        $order = Order::findOrFail($orderId);

        if ($order->token == $token) {
            $order->update([
                'status' => Order::PROCESSING
            ]);
        }

        return redirect()->route('home')->with('error', 'Đã có lỗi xảy ra');
    }

    public static function cancelUnacceptedOrders()
    {
        Order::where('status', Order::PENDING)
            ->where('created_at', '<', Carbon::now()->subMinute())
            ->update(['status' => Order::CANCELLED]);
    }
}
