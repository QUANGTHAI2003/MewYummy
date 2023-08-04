<?php

namespace App\Traits;

trait CreateProductData
{

    protected $rules = [
        'name'                                 => 'required|unique:products,name',
        'slug'                                 => 'unique:products,slug',
        'regular_price'                        => 'required|integer|min:0|max:100000000|gte:sale_price',
        'sale_price'                           => 'nullable|integer|min:0|max:100000000|lte:regular_price',
        'image'                                => 'required|image|max:2048',
        'images'                               => 'nullable|array|max:5',
        'images.*'                             => 'image|max:2048',
        'category_id'                          => 'required|exists:categories,id',
        'stock_qty'                            => 'required|integer|min:0',
        'description'                          => 'nullable',
        'is_active'                            => 'boolean',
        'attribute_values'                     => 'nullable|array',
        'attribute_values.*'                   => 'nullable',
        'attribute_value_options_price'        => 'nullable|array',
        'attribute_value_options_price.*'      => 'nullable|integer|min:0|max:100000000',
        'attribute_value_options_sale_price'   => 'nullable|array',
        'attribute_value_options_sale_price.*' => 'nullable|integer|min:0|max:100000000',
        'attribute_value_options_quantity'     => 'nullable|array',
        'attribute_value_options_quantity.*'   => 'nullable|integer|min:0|max:100000000'
    ];

    protected $messages = [
        'required' => ':attribute không được để trống.',
        'unique'   => ':attribute đã tồn tại.',
        'integer'  => ':attribute phải là số nguyên.',
        'min'      => ':attribute phải lớn hơn :min.',
        'max'      => ':attribute phải nhỏ hơn :max.',
        'array'    => ':attribute phải là một mảng.',
        'image'    => ':attribute phải là một hình ảnh.',
        'mimes'    => ':attribute phải có định dạng: :values.',
        'gte'      => ':attribute phải lớn hơn hoặc bằng :value.',
        'lte'      => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'exists'   => ':attribute không tồn tại.'
    ];

    protected $validationAttributes = [
        'name'                                     => 'Tên sản phẩm',
        'slug'                                     => 'Slug',
        'regular_price'                            => 'Giá gốc',
        'sale_price'                               => 'Giá khuyến mãi',
        'image'                                    => 'Hình ảnh',
        'images'                                   => 'Hình ảnh',
        'category_id'                              => 'Danh mục',
        'stock_qty'                                => 'Số lượng',
        'description'                              => 'Mô tả',
        'is_active'                                => 'Trạng thái',
        'attribute_values'                         => 'Thuộc tính',
        'attribute_values.*'                       => 'Thuộc tính',
        'attribute_value_options_price'            => 'Giá gốc thuộc tính',
        'attribute_value_options_price.*.gte'      => 'Giá gốc thuộc tính phải lớn hơn hoặc bằng giá bán thuộc tính.',
        'attribute_value_options_price.*'          => 'Giá gốc thuộc tính',
        'attribute_value_options_sale_price'       => 'Giá bán thuộc tính',
        'attribute_value_options_sale_price.*.lte' => 'Giá bán thuộc tính phải nhỏ hơn hoặc bằng giá gốc thuộc tính.',
        'attribute_value_options_sale_price.*'     => 'Giá bán thuộc tính',
        'attribute_value_options_quantity'         => 'Số lượng thuộc tính',
        'attribute_value_options_quantity.*'       => 'Số lượng thuộc tính'
    ];
}
