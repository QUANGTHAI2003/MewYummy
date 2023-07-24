<?php

namespace App\Http\Livewire\Admin\Categories;

use Exception;
use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Traits\tableSortingTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminCategories extends Component {

    use WithPagination;
    use tableSortingTrait;
    use AuthorizesRequests;
    use Actions;

    public $categoryId;
    public $search              = '';
    public $selectAllCategories = false;
    public $selectedCategories  = [];
    protected $queryString      = [
        'search' => ['except' => ''],
        'sortColumnName' => ['except' => 'id', 'as' => 'sort'],
        'sortDirection' => ['except' => 'desc', 'as' => 'direction']
    ];
    protected $listeners = ['resetSelected' => 'resetSelected'];

    public function destroyCategory() {
        try {
            try {
                $this->authorize('Delete category');
                $category     = Category::findOrFail($this->categoryId);
                $categoryName = $category->name;
                $category->delete();

                $this->resetSelected();

                $this->notification()->success(
                    $title = 'Đã xóa !!!',
                    $description = 'Đã xóa danh mục <strong>' . $categoryName . '</strong>'
                );
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = 'Đã xảy ra lỗi !!!',
                    $description = 'Bạn không có quyền xóa danh mục'
                );
            }
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Đã xảy ra lỗi !!!',
                $description = 'Xóa danh mục thất bại'
            );
        }
    }

    public function deleteCategory($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function deleteSelected() {
        try {
            try {
                $this->authorize('Delete category');
                $categories = Category::whereIn('id', $this->selectedCategories)->get();
                foreach ($categories as $category) {
                    $category->delete();
                }

                $this->resetSelected();
                
                $this->notification()->success(
                    $title = 'Đã xóa !!!',
                    $description = 'Đã xóa các danh mục đã chọn'
                );
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = 'Đã xảy ra lỗi !!!',
                    $description = 'Bạn không có quyền xóa danh mục'
                );
            }
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Đã xảy ra lỗi !!!',
                $description = 'Xóa danh mục thất bại'
            );
        }
    }

    public function resetSelected() {
        $this->selectAllCategories = false;
        $this->selectedCategories  = [];
    }

    public function updatedSelectAllCategories($value) {
        if ($value) {
            $this->selectedCategories = $this->getCategories()->pluck('id')->map(fn($id) => (string) $id);
        } else {
            $this->selectedCategories = [];
        }
    }

    public function getCategories() {
        return Category::all();
    }

    public function updatedSelectedCategories($value) {
        if ($value && count($value) === $this->getCategories()->count()) {
            $this->selectAllCategories = true;
        } else {
            $this->selectAllCategories = false;
        }
    }

    public function render() {
        $categories = Category::select('categories.*')
            ->when($this->search, function ($query) {
                $query->where('categories.name', 'like', '%' . $this->search . '%');
            })
                     ->orderBy($this->sortColumnName, $this->sortDirection)
                     ->orderBy($this->sortByColumn(), $this->sortDirection())
                     ->paginate($this->perPage);

        return view('livewire.admin.categories.admin-categories', compact('categories'));
    }
}
