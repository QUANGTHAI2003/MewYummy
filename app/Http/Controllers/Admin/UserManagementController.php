<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Spatie\Permission\Models\Permission;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Manage users');
    }

    public function index()
    {
        // $users = User::with('roles.permissions')->get();

        return view('admin.authorizations.users.index');
    }

    public function create()
    {
        $roles       = Role::all();
        $permissions = Permission::all();

        return view('admin.authorizations.users.create', compact('roles', 'permissions'));
    }

    public function store(UserRequest $request)
    {
        try {
            $data             = $request->validated();
            $data['password'] = bcrypt($data['password']);
            $user             = User::create($data);

            if ($request->role) {
                $role = Role::where('id', $request->role)->select('name')->first()->name;
                $user->assignRole($role);
            }
            if ($request->permissions) {
                $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
                $user->givePermissionTo($permissions ?? []);
            }

            Log::info(auth()->user()->name . ' đã tạo người dùng ' . $data['name'] . '.');

            return redirect()->route('admin.users.index')->with('success', 'User created successfully');
        } catch (Exception $ex) {
            Log::alert(auth()->user()->name . ' đã tạo người dùng thất bại. ' . $ex->getMessage());
            return redirect()->route('admin.users.index')->with('error', 'User created failed');
        }
    }

    public function edit(User $user)
    {
        $roleId = $user->roles->pluck('id')->first();
        $roles  = Role::all();

        $permissions      = Permission::all();
        $checkUserHasRole = $user->hasAnyRole($roles);

        if ($checkUserHasRole) {
            $role          = $user->roles[0];
            $permissionsId = $role->permissions->pluck('id')->toArray();
        } else {
            $permissionsId = $user->permissions->pluck('id')->toArray();
        }

        foreach ($permissions as $key => $permission) {
            if (in_array($permission->id, $permissionsId)) {
                $permissions[$key]['checked'] = true;
            } else {
                $permissions[$key]['checked'] = false;
            }
        }

        return view('admin.authorizations.users.edit', compact('user', 'roleId', 'permissions', 'roles', 'permissionsId', 'checkUserHasRole'));
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $data = $request->except('_token', 'roles', 'permissions');
            if ($request->password) {
                $data['password'] = bcrypt($data['password']);
            }
            $user->update($data);

            // update role
            if ($request->role) {
                $role = Role::where('id', $request->role)->select('name')->first()->name;
                $user->syncRoles($role);
            }

            // update permissions
            if ($request->permissions) {
                $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
                $user->syncPermissions($permissions ?? []);
            }

            Log::info(auth()->user()->name . ' đã cập nhật người dùng ' . $data['name'] . '.');

            return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
        } catch (Exception $ex) {
            Log::alert(auth()->user()->name . ' đã cập nhật người dùng thất bại. ' . $ex->getMessage());
            return redirect()->route('admin.users.index')->with('error', 'User updated failed');
        }
    }

    public function getPermissions(Role $role)
    {
        $permissions = $role->permissions->pluck('name', 'id')->toArray();

        return response()->json($permissions);
    }
}
