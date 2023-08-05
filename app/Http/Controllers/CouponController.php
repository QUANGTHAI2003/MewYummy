<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Coupon;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
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
