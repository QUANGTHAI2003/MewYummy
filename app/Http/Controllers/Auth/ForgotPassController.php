<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPassController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('forgotPassword', 'postForgotPassword', 'resetPassword', 'postResetPassword');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không tồn tại'
        ]);

        $token = md5($request->email . time());

        $user = User::where('email', $request->email)->first();
        $user->update([
            'token' => $token
        ]);
        $user->save();

        Mail::to($request->email)->send(new ForgotPassword($user));

        return back()->with('status', 'Vui lòng kiểm tra email của bạn');
    }

    public function resetPassword($token)
    {
        $user = User::where('token', $token)->first();
        if (!$user) {
            return redirect()->route('home');
        }
        return view('auth.reset-password', compact('user'));
    }

    public function postResetPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|min:6|max:32',
            'password_confirmation' => 'required|same:password'
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không được quá 32 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
            'password_confirmation.same' => 'Mật khẩu nhập lại không khớp'
        ]);

        $user = User::where('token', $token)->first();
        if (!$user) {
            return redirect()->route('home');
        }

        $user->update([
            'password' => bcrypt($request->password),
            'token' => null
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Đổi mật khẩu thành công');
    }
    
}
