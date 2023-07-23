<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class ProductController extends Controller{

    public function list(){
        return view('clients.pages.product');
    }

    public function detail($id){
        return view('clients.pages.product_detail', ['id' => $id]);
    }
}
