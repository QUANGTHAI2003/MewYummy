<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleManagementController extends Controller
{
    public function __construct() {
        $this->middleware('permission:Manage users');
    }

    public function index() {
        return view('admin.authorizations.roles.index');
    }

    public function create() {
        $roles       = Role::all();
        $permissions = Permission::all();

        return view('admin.authorizations.roles.create', compact('roles', 'permissions'));
    }

    public function store(Request $request) {
        $rolesName = $request->name;
        $description = $request->description;
        $permissions = $request->permissions;

        $role = Role::create([
            'name' => $rolesName,
            'description' => $description ?? 'Đang cập nhật',
            'guard_name' => 'web'
        ]);

        $role->givePermissionTo($permissions);

        return redirect()->route('admin.roles.index')->with('success', 'User created successfully');
    }

    public function edit($id) {
        $role = Role::find($id);
        $permissions = Permission::all();
        $permissionsId = $role->permissions->pluck('id')->toArray();

        foreach ($permissions as $key => $permission) {
            if (in_array($permission->id, $permissionsId)) {
                $permissions[$key]['checked'] = true;
            } else {
                $permissions[$key]['checked'] = false;
            }
        }
        

        return view('admin.authorizations.roles.edit', compact('role', 'permissions', 'permissionsId'));
    }

    public function update(Request $request, $id) {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->description = $request->description ?? 'Đang cập nhật';
        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index')->with('success', 'User updated successfully');
    }
}
