<?php

namespace App\Http\Livewire\Admin\Authorizations;

use App\Models\User;
use Livewire\Component;

class UserManagement extends Component {

    public $permissions;

    public function showPermissions($id) {
        $user = User::with('roles.permissions')->find($id);
        $permissions = $user->roles->pluck('permissions')->flatten()->pluck('name')->toArray();
        $this->permissions = $permissions;
    }

    public function render() {
        $users = User::with('roles')->get();
        return view('livewire.admin.authorizations.user-management', compact('users'));
    }
}
