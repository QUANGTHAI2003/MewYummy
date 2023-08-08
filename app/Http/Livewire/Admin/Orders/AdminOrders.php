<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Traits\tableSortingTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminOrders extends Component
{
    use WithPagination;
    use tableSortingTrait;
    use AuthorizesRequests;
    use Actions;

    public string $search = '';
    public $orderId;

    public function updateOrderStatus($orderId, $status)
    {
        // $this->authorize('update', Order::class);
        $order = Order::findOrFail($orderId);
        if($status == Order::COMPLETED && $order->status == Order::CANCELLED) {
            $this->notification()->error(
                $title = 'Lỗi !!!',
                $description = 'Đơn hàng đã bị hủy, không thể cập nhật trạng thái thành hoàn thành.'
            );
            return;
        }
        $order->status = $status;
        if($status == Order::COMPLETED) {
            $order->delivered_date = now();
        } else if ($status == Order::CANCELLED) {
            $order->cancelled_date = now();
        }
        $order->save();

        $this->notification()->success(
            $title = 'Đã lưu !!!',
            $description = 'Đã cập nhật trạng thái đơn hàng thành công.'
        );
    }

    public function render()
    {
        $orders = Order::query()
            ->with('transaction')
            ->when($this->search, function ($query) {
                $query->where('products.name', 'like', '%' . $this->search . '%')
                      ->orWhere('categories.name', 'like', '%' . $this->search . '%');
            })->orderBy($this->sortColumnName, $this->sortDirection)
                     ->paginate($this->perPage);
        return view('livewire.admin.orders.admin-orders', compact('orders'));
    }
}
