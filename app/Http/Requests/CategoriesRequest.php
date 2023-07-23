<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        switch ($this->route()->getActionMethod()){
            case 'store':
                return [
                    'name' => 'required|unique:categories,name',
                    'slug' => 'unique:categories,slug',
                ];
            case 'update':
                $categoryId = $this->route()->parameter('category');

                return [
                    'name' => 'required|unique:categories,name,' . $categoryId,
                    'slug' => 'unique:categories,slug,' . $categoryId,
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
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'unique'   => ':attribute đã tồn tại',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function attributes(){
        return [
            'name' => 'Tên danh mục',
            'slug' => 'Slug',
        ];
    }
}
