<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                    'name' => 'required|max:255|unique:roles,name',
                    'permissions' => 'required',
                ];
            case 'PUT':
                $id = $this->route('role');
                return [
                    'name' => 'required|max:255|unique:roles,name,'. $id,
                    'permissions' => 'required',
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
            'name' => 'Tên vai trò',
            'permissions' => 'Quyền',
        ];
    }
}
