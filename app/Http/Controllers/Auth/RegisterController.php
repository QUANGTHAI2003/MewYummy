<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function register() {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        if ($user) {
            event(new Registered($user));
            return redirect()->route('login');
        }
        return back()->with('error', 'Đăng ký thất bại');
    }

}
