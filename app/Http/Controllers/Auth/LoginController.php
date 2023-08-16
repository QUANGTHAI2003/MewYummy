<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
        $remember = $request->filled('remember_me');

        $roles = Role::all()->pluck('name')->toArray();

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->is_active    = 1;
            $user->last_seen_at = now();
            $user->save();
        }

        if (auth()->attempt($credentials, $remember)) {
            if ($user->hasAnyRole($roles)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            }
        }

        return back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('home');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        try {
            $user = User::where('email', $data->email)->first();

            if (!$user) {
                $user = User::create([
                    'name'              => $data->name,
                    'email'             => $data->email,
                    'avatar'            => $data->avatar,
                    'provider_id'       => $data->id,
                    'password'          => bcrypt('123456'),
                    'is_active'         => 1,
                    'last_seen_at'      => now(),
                    'email_verified_at' => now()
                ]);
            } else {
                $user->is_active    = 1;
                $user->last_seen_at = now();
                $user->save();
            }

            auth()->login($user);
        } catch (\Throwable $th) {
            return back()->with('error', 'Đã có lỗi xảy ra');
        }
    }

    public function logout(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if ($user) {
            $user->is_active    = 0;
            $user->last_seen_at = now();
            $user->save();
        }

        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
