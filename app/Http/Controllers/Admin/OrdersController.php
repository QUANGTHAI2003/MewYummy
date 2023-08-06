<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }

    public function show($id) {
        return view('admin.orders.show', compact('id'));
    }
}
