<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name'       => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages() {
        return [
            'required'  => ':attribute không được để trống',
            'email'     => ':attribute không đúng định dạng',
            'unique'    => ':attribute đã tồn tại',
            'min'       => ':attribute phải có ít nhất :min ký tự',
            'confirmed' => ':attribute không khớp',
            'same'      => ':attribute không khớp'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function attributes() {
        return [
            'name'       => 'Tên',
            'email'      => 'Email',
            'password'   => 'Mật khẩu',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function filters() {
        return [
            'name'       => 'trim',
            'email'      => 'trim',
            'password'   => 'trim',
        ];
    }
}
