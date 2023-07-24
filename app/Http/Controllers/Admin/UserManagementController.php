<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserManagementController extends Controller {
    public function __construct() {
        $this->middleware('permission:Manage users');
    }

    public function index() {
        // $users = User::with('roles.permissions')->get();

        return view('admin.authorizations.users.index');
    }

    public function create() {
        $roles       = Role::all();
        $permissions = Permission::all();

        return view('admin.authorizations.users.create', compact('roles', 'permissions'));
    }

    public function store(Request $request) {
        $data             = $request->except('_token', 'roles', 'permissions');
        $data['password'] = bcrypt($data['password']);
        $user             = User::create($data);

        $role        = Role::where('id', $request->role)->select('name')->first()->name;
        if($request->permissions) {
            $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
        }
       
        $user->assignRole($role);
        $user->givePermissionTo($permissions ?? []);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user) {
        // get role
        $roleId = $user->roles->pluck('id')->first();
        $roles = Role::all();
        $permissions = Permission::all();
        $permissionsId = $user->permissions->pluck('id')->toArray();

        // merge permissions and permissions id
        $permissions = $permissions->map(function ($permission) use ($permissionsId) {
            if (in_array($permission->id, $permissionsId)) {
                $permission->checked = true;
            } else {
                $permission->checked = false;
            }
            return $permission;
        });

        return view('admin.authorizations.users.edit', compact('user', 'roleId', 'permissions', 'roles', 'permissionsId'));
    }

    public function update(Request $request, User $user) {
        $data = $request->except('_token', 'roles', 'permissions');
        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);

        $role = Role::where('id', $request->role)->select('name')->first()->name;
        if($request->permissions) {
            $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
        }
        $user->syncRoles($role);
        $user->syncPermissions($permissions ?? []);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function getPermissions(Role $role) {
        $permissions = $role->permissions->pluck('name', 'id')->toArray();

        return response()->json($permissions);
    }
}
