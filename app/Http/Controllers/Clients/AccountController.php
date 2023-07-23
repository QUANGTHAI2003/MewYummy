<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class AccountController extends Controller{

    public function profile(){
        return view('clients.account.profile');
    }

    public function updateInfo(){
        return view('clients.account.update_info');
    }

    public function updatePassword(){
        return view('clients.account.change_pass');
    }

}
