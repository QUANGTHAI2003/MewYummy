<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller {
    public function __construct() {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request) {
        $credentials = $request->validated();

        $roles = Role::all()->pluck('name')->toArray();

        $user = User::where('email', $request->email)->first();
        $user->is_active = 1;
        $user->last_seen_at = now();
        $user->save();

        if (auth()->attempt($credentials)) {
            if ($user->hasAnyRole($roles)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request) {
        $user = User::find(auth()->user()->id);
        $user->is_active = 0;
        $user->last_seen_at = now();
        $user->save();

        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
