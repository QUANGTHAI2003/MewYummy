<?php

namespace App\Http\Controllers\Client\Orders;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

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
}
