<?php

namespace App\Http\Livewire\Admin\Products;

use Exception;
use App\Models\Coupon;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Traits\tableSortingTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminCoupons extends Component
{
    use WithPagination;
    use tableSortingTrait;
    use AuthorizesRequests;
    use Actions;

    public string $search   = '';
    public $selectAllCoupon = false;
    public $selectedCoupons = [];
    public $couponId;
    protected $queryString = [
        'search'         => ['except' => ''],
        'sortColumnName' => ['except' => 'id', 'as' => 'sort'],
        'sortDirection'  => ['except' => 'desc', 'as' => 'direction']
    ];

    protected $listeners = ['resetSelected' => 'resetSelected'];

    public function destroyCoupon()
    {
        try {
            try {
                $this->authorize('Delete coupon');
                $coupon     = Coupon::findOrFail($this->couponId);
                $couponName = "Test";
                $coupon->delete();

                $this->resetSelected();

                $this->notification()->success(
                    $title = 'Đã xóa !!!',
                    $description = 'Đã xóa mã giảm giá <strong>' . $couponName . '</strong>'
                );
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = 'Lỗi !!!',
                    $description = 'Đã xảy ra lỗi khi xóa mã giảm giá <strong>' . $couponName . '</strong>'
                );
            }
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Lỗi !!!',
                $description = 'Đã xảy ra lỗi khi xóa mã giảm giá'
            );
        }
    }

    public function deleteSelectedCoupon($couponId)
    {
        $this->couponId = $couponId;
    }

    public function deleteSelected()
    {
        try {
            try {
                $this->authorize('Delete coupon');
                $coupon = Coupon::whereIn('id', $this->selectedCoupons)->get();
                foreach ($coupon as $coupon) {
                    $coupon->delete();
                }

                $this->resetSelected();

                $this->notification()->success(
                    $title = 'Đã xóa !!!',
                    $description = 'Đã xóa mã giảm giá đã chọn'
                );
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = 'Lỗi !!!',
                    $description = 'Đã xảy ra lỗi khi xóa mã giảm giá đã chọn'
                );
            }
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Lỗi !!!',
                $description = 'Đã xảy ra lỗi khi xóa mã giảm giá'
            );
        }
    }

    public function resetSelected()
    {
        $this->selectAllCoupon = false;
        $this->selectedCoupons = [];
    }

    public function updatedSelectAllCoupon($value)
    {
        if ($value) {
            $this->selectedCoupons = $this->getProducts()->pluck('id')->map(fn($id) => (string) $id);
        } else {
            $this->selectedCoupons = [];
        }
    }

    public function getProducts()
    {
        return Coupon::all();
    }

    public function updatedSelectedCoupons($value)
    {
        if ($value && count($value) === $this->getProducts()->count()) {
            $this->selectAllCoupon = true;
        } else {
            $this->selectAllCoupon = false;
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $coupons = Coupon::query()
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.admin.products.admin-coupons', [
            'coupons' => $coupons
        ]);
    }
}
