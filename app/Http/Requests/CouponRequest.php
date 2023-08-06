<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'code'       => 'required|unique:coupons,code',
                    'type'       => 'required|in:percent,fixed',
                    'value'      => 'required',
                    'cart_value' => 'required',
                    'expiry_date' => 'required'
                ];
            case 'update':
                $couponId = $this->route()->parameter('coupon');

                return [
                    'code'       => 'required|unique:coupons,code,' . $couponId,
                    'type'       => 'required|in:percent,fixed',
                    'value'      => 'required',
                    'cart_value' => 'required',
                    'expiry_date' => 'required'
                ];
            default:
                return [];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'unique'   => ':attribute đã tồn tại',
            'in'       => ':attribute không hợp lệ'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'code'       => 'Mã giảm giá',
            'type'       => 'Loại giảm giá',
            'value'      => 'Giá trị giảm giá',
            'cart_value' => 'Giá trị giỏ hàng'
        ];
    }
}
