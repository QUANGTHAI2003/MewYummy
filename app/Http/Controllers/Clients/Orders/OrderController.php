<?php

namespace App\Http\Controllers\Clients\Orders;

use Carbon\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\Order\OrderShipped;
use App\Http\Controllers\Controller;
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

        $pdf = Pdf::loadView('clients.account.invoice', compact('order'));

        return $pdf->stream();
    }

    public function generateInvoice($orderId)
    {
        $order = Order::with(['transaction', 'orderItems'])->findOrFail($orderId);

        $pdf = Pdf::loadView('clients.account.invoice', compact('order'));

        return $pdf->download($order->name . '-' . $order->id . '.pdf');
    }

    public function acceptOrder($orderId, $token)
    {
        $order = Order::findOrFail($orderId);
        if ($order->status != Order::CANCELLED) {
            if ($order->token == $token) {
                $order->update([
                    'status' => Order::PROCESSING,
                    'token'  => null
                ]);

                session()->flash('success', 'Đơn hàng đã được xác nhận thành công');
            }
            return redirect()->route('home')->with('error', 'Đơn hàng đã bị hủy trước đó');

        } else {
            return redirect()->route('home')->with('error', 'Đã có lỗi xảy ra');
        }

    }

    public static function cancelUnacceptedOrders()
    {
        $order = Order::where('status', Order::PENDING)
            ->where('created_at', '<', Carbon::now()->subMinute())
            ->update(['status' => Order::CANCELLED, 'token' => null]);

            Mail::to($order->email)->send(new OrderShipped($order));
    }

    public function cancelOrder($orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->status !== Order::COMPLETED && $order->token === null) {
            $order->update([
                'status' => Order::CANCELLED,
                'token'  => null
            ]);

            Mail::to($order->email)->send(new OrderShipped($order));

            session()->flash('success', 'Đã huỷ đơn hàng thành công');

        } else {
            return redirect()->route('account.index')->with('error', 'Đơn hàng đã bị hủy trước đó');
        }

        return redirect()->route('account.index')->with('error', 'Đã có lỗi xảy ra');
    }
}
