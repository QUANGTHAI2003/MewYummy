<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|max:255|unique:users,name',
                    'email' => 'required|max:255|unique:users,email',
                    'password' => 'required|min:6|max:255',
                    'role' => 'required_without:permissions',
                    'permissions' => 'required_without:role',
                ];
            case 'PUT':
                return [
                    'name' => 'required|max:255|unique:users,name,' . $this->route('user')->id,
                    'email' => 'required|max:255|unique:users,email,' . $this->route('user')->id,
                    'password' => 'nullable|min:6|max:255',
                    'role' => 'required_without:permissions',
                    'permissions' => 'required_without:role',
                ];
            default:
                return [];
        }
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
            'max' => ':attribute không được vượt quá :max ký tự',
            'min' => ':attribute không được ít hơn :min ký tự',
            'unique' => ':attribute đã tồn tại',
            'required_without' => 'Vui lòng chọn ít nhất 1 trong 2 trường :attribute hoặc :values',
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
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'role' => 'Vai trò',
            'permissions' => 'Quyền',
            'values' => 'Vai trò hoặc Quyền',
        ];
    }
}
