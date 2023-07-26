<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

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
        $score = RecaptchaV3::verify($this->get('g-recaptcha-response'), 'postRegister');
        return [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|confirmed|same:password_confirmation',
            'password_confirmation' => 'required|min:6|same:password',
            // 'g-recaptcha-response'  => 'required|recaptchav3:register,0.5',
            'terms_of_service'      => 'required|accepted'
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
            'name'     => 'Tên',
            'email'    => 'Email',
            'password' => 'Mật khẩu',
            'g-recaptcha-response' => 'reCAPTCHA',
            'terms_of_service' => 'Điều khoản sử dụng'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function filters() {
        return [
            'name'     => 'trim',
            'email'    => 'trim',
            'password' => 'trim'
        ];
    }
}
