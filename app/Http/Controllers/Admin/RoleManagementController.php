<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use Spatie\Permission\Models\Permission;

class RoleManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Manage users');
    }

    public function index()
    {
        return view('admin.authorizations.roles.index');
    }

    public function create()
    {
        $roles       = Role::all();
        $permissions = Permission::all();

        return view('admin.authorizations.roles.create', compact('roles', 'permissions'));
    }

    public function store(RoleRequest $request)
    {
        $data = $request->validated();

        $role = Role::create([
            'name'        => $data['name'],
            'description' => $data['description'] ?? 'Đang cập nhật',
            'guard_name'  => 'web'
        ]);

        $role->givePermissionTo($data['permissions']);

        return redirect()->route('admin.roles.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $role          = Role::find($id);
        $permissions   = Permission::all();
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

    public function update(RoleRequest $request, $id)
    {
        $data = $request->validated();

        $role = Role::find($id);
        $role->update([
            'name'        => $data['name'],
            'description' => $data['description'] ?? 'Đang cập nhật',
            'guard_name'  => 'web'
        ]);

        $role->syncPermissions($data['permissions']);

        return redirect()->route('admin.roles.index')->with('success', 'User updated successfully');
    }
}
