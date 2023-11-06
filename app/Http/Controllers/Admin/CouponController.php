<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\Coupon;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
     function __construct() {
        $this->middleware('permission:View coupons', ['only' => ['index']]);
        $this->middleware('permission:Create coupon', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update coupon', ['only' => ['edit', 'update']]);
    }
    public function index()
    {
        return view('admin.products.coupons.index');
    }

    public function create()
    {
        return view('admin.products.coupons.create');
    }

    public function store(CouponRequest $request)
    {
        $data = $request->validated();

        Coupon::create($data);

        return redirect()->route('admin.coupons.index')->with('success', 'Thêm mới mã giảm giá thành công');
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('admin.products.coupons.edit', compact('coupon'));
    }

    public function update(CouponRequest $request, $id)
    {
        try {
            $data = $request->validated();

            $coupon = Coupon::findOrFail($id);
            $coupon->update($data);

            return redirect()
                ->route('admin.coupons.index')
                ->with('success', 'Cập nhật mã giảm giá thành công');
        } catch (Exception $ex) {
            return redirect()
                ->route('admin.coupons.index')
                ->with('error', 'Cập nhật mã giảm giá thất bại');
        }
    }
}
