<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct() {
        $this->middleware('permission:View orders', ['only' => ['index']]);
        $this->middleware('permission:View orders', ['only' => ['show']]);
    }

    public function index()
    {
        return view('admin.orders.index');
    }

    public function show($id) {
        return view('admin.orders.show', compact('id'));
    }
}
