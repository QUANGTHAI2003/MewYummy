<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login()
    {
        return view('clients.pages.login');
    }

    public function register()
    {
        return view('clients.pages.register');
    }

    public function logout()
    {
        return view('clients.pages.logout');
    }
}
