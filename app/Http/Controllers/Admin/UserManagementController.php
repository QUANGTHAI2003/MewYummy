<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller {
    public function __construct() {
        $this->middleware('permission:Manage users');
    }

    public function index() {
        // $users = User::with('roles.permissions')->get();

        return view('admin.users.index');
    }
}
