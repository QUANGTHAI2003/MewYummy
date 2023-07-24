<?php

namespace App\Http\Livewire\Admin\Authorizations;

use App\Models\User;
use Livewire\Component;
use App\Traits\tableSortingTrait;

class UserManagement extends Component {

    use tableSortingTrait;
    public $permissions;
    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
        'sortColumnName' => ['except' => 'id', 'as' => 'sort'],
        'sortDirection' => ['except' => 'desc', 'as' => 'direction']
    ];

    public function showPermissions($id) {
        $user              = User::with('roles.permissions', 'permissions')->find($id);
        $rolePermissions        = $user->roles->pluck('permissions')->flatten()->pluck('name')->toArray();
        $userPermissions = $user->permissions->pluck('name');
       
        $permissions = array_unique(array_merge($rolePermissions, $userPermissions->toArray()));


        $this->permissions = $permissions;
    }

    public function render() {
        $users = User::with('roles')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
                     ->orderBy($this->sortColumnName, $this->sortDirection)
                     ->orderBy($this->sortByColumn(), $this->sortDirection())
                     ->paginate($this->perPage);
        return view('livewire.admin.authorizations.user-management', compact('users'));
    }
}
