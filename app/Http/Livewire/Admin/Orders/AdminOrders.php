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
