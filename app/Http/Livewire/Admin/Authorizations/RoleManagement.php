<?php

namespace App\Http\Livewire\Admin\Authorizations;

use App\Traits\tableSortingTrait;
use Exception;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use WireUi\Traits\Actions;

class RoleManagement extends Component
{
    use tableSortingTrait;
    use Actions;

    public $search = '';
    protected $queryString = [
        'sortColumnName' => ['except' => 'id', 'as' => 'sort'],
        'sortDirection' => ['except' => 'desc', 'as' => 'direction'],
        'search' => ['except' => '']
    ];

    public $roleId;

    public function destroyRole() {
        try {
            $role = Role::findOrFail($this->roleId);
            $role->delete();
            $this->notification()->success(
                $title = 'Đã xóa !!!',
                $description = 'Đã xóa vai trò <strong>' . $role->name . '</strong>'
            );
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Đã xảy ra lỗi !!!',
                $description = 'Xóa vai trò thất bại'
            );
        }
    }

    public function deleteRole($roleId) {
        $this->roleId = $roleId;
    }

    public function render()
    {
        $roles = Role::with('permissions')
                    ->when($this->search, function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                 ->orderBy($this->sortColumnName, $this->sortDirection)
                 ->orderBy($this->sortByColumn(), $this->sortDirection())
                 ->paginate($this->perPage);
        return view('livewire.admin.authorizations.role-management', compact('roles'));
    }
}
