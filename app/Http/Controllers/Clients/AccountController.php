<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInfoRequest;
use App\Traits\uploadImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller{

    use uploadImageTrait;

    public function __construct(){
        $this->middleware('auth');
    }

    public function profile(){
        $user = auth()->user();
        return view('clients.account.profile', compact('user'));
    }

    public function updateInfo(){
        $user = auth()->user();
        return view('clients.account.update_info', compact('user'));
    }

    public function postUpdateInfo(UpdateInfoRequest $request, $id){
        $data = $request->validated();

        if($request->hasFile('avatar')){
            $data['avatar'] = $this->uploadOneImage($request->avatar, 'avatar');
        }

        $user = auth()->user();

        $user->update($data);

        return redirect()->route('account.index')->with('success', 'Cập nhật thông tin thành công');
    }

    public function updatePassword(){
        return view('clients.account.change_pass');
    }

    public function postUpdatePassword(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = auth()->user();

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        Auth::logoutOtherDevices($request->password);

        return redirect()->route('account.index')->with('success', 'Cập nhật mật khẩu thành công');
    }

}
