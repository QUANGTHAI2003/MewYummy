<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class HomeController extends Controller{

    public function index(){
        return view('clients.pages.home');
    }
}
