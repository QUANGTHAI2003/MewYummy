<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest
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
        $userId = auth()->user()->id;
        return [
            'username' => 'required|min:3|max:255|unique:users,username,' . $userId,
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|email:rfc,dns|unique:users,email,' . $userId,
            'phone_number' => 'required|min:3|max:255|unique:users,phone_number,' . $userId,
            'address' => 'required|min:3|max:255',
            'avatar' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    /**
     * Get the messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'email' => ':attribute không đúng định dạng',
            'image' => ':attribute phải là ảnh',
            'mimes' => ':attribute phải có định dạng: :values',
            'regex' => ':attribute không đúng định dạng',
        ];
    }

    /**
     * Get the attributes that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'username' => 'Tên đăng nhập',
            'name' => 'Tên',
            'email' => 'Email',
            'phone_number' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'avatar' => 'Ảnh đại diện'
        ];
    }
}
