<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        switch ($this->route()->getActionMethod()) {
            case 'store':
                return [
                    'name'          => 'required|unique:products,name',
                    'slug'          => 'unique:products,slug',
                    'regular_price' => 'required|integer|min:0',
                    'sale_price'    => 'nullable|integer|min:0',
                    'image'         => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
                    'categories'    => 'required',
                    'stock_qty'     => 'required|integer|min:0',
                    'description'   => 'nullable'
                ];
            case 'update':
                $productId = $this->route()->parameter('product');

                return [
                    'name'          => 'required|unique:products,name,' . $productId,
                    'slug'          => 'unique:products,slug,' . $productId,
                    'regular_price' => 'required|integer|min:0',
                    'sale_price'    => 'nullable|integer|min:0',
                    'image'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                    'categories'    => 'required',
                    'stock_qty'     => 'required|integer|min:0',
                    'description'   => 'nullable'
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
    public function messages() {
        return [
            'required' => ':attribute bắt buộc.',
            'unique'   => ':attribute đã tồn tại.',
            'integer'  => ':attribute phải là số.',
            'min'      => ':attribute phải lớn hơn :min.',
            'image'    => ':attribute phải là ảnh.',
            'mimes'    => ':attribute phải là định dạng :mimes.',
            'max'      => ':attribute phải nhỏ hơn :max KB.',
            'gte'      => ':attribute phải lớn hơn hoặc bằng :value.',
            'lte'      => ':attribute phải nhỏ hơn hoặc bằng :value.'
        ];
    }

    /**
     * Get the attributes for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function attributes() {
        return [
            'name'          => 'Tên sản phẩm',
            'slug'          => 'Slug',
            'regular_price' => 'Giá ban đầu',
            'sale_price'    => 'Giá khuyến mãi',
            'image'         => 'Ảnh sản phẩm',
            'categories'    => 'Danh mục sản phẩm',
            'stock_qty'     => 'Số lượng sản phẩm',
            'brands'        => 'Tên thuơng hiệu',
            'description'   => 'Mô tả sản phẩm'
        ];
    }
}
