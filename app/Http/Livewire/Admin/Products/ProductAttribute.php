<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\ProductAttribute as ModelsProductAttribute;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Traits\tableSortingTrait;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductAttribute extends Component
{
    use WithPagination;
    use tableSortingTrait;
    use AuthorizesRequests;
    use Actions;

    public string $search  = '';
    public $selectAllProductAttributes = FALSE;
    public $selectedProductAttribute = [];
    public $attributeId;
    protected $queryString = [
        'search'         => ['except' => ''],
        'sortColumnName' => ['except' => 'id', 'as' => 'sort'],
        'sortDirection'  => ['except' => 'desc', 'as' => 'direction']
    ];

    public function deleteSelected() {
        try {
            try {
                // $this->authorize('Delete product attribute');
                $productAttributes = ModelsProductAttribute::whereIn('id', $this->selectedProductAttribute)->get();
                if($productAttributes !== null) {
                    foreach ($productAttributes as $attribute) {
                        $attribute->delete();
                    }
                }

                $this->resetSelected();

                $this->notification()->success(
                    $title = 'Đã xóa !!!',
                    $description = 'Đã xóa các thuộc tính đã chọn'
                );
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = 'Lỗi !!!',
                    $description = 'Không thể xóa các thuộc tính đã chọn'
                );
            }
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Lỗi !!!',
                $description = 'Không thể xóa các thuộc tính đã chọn'
            );
        }
    }

    public function destroyAttribute() {
        try {
            try {
                // $this->authorize('Delete product attribute');
                $attribute = ModelsProductAttribute::where('id', $this->attributeId)->first();
                if($attribute !== null) {
                    $attributeName = $attribute->name;
                    $attribute->delete();
                }

                $this->resetSelected();

                $this->notification()->success(
                    $title = 'Đã xóa !!!',
                    $description = 'Đã xóa thuộc tính <strong>' . $attributeName . '</strong>'
                );
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = 'Lỗi !!!',
                    $description = 'Không thể xóa thuộc tính <strong>' . $attributeName . '</strong>'
                );
            }
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Lỗi !!!',
                $description = 'Không thể xóa thuộc tính <strong>' . $attributeName . '</strong>'
            );
        }
    }

    public function deleteSelectedAttribute($attributeId) {
        $this->attributeId = $attributeId;
    }

    public function resetSelected() {
        $this->selectAllProductAttributes = FALSE;
        $this->selectedProductAttribute = [];
    }

    public function updatedSelectAllProductAttributes($value) {
        if ($value) {
            $this->selectedProductAttribute = $this->getProductAttributes()->pluck('id')->map(fn($id) => (string) $id);
        } else {
            $this->selectedProductAttribute = [];
        }
    }

    public function updatedSelectedProductAttribute($value) {
        if ($value && count($value) === $this->getProductAttributes()->count()) {
            $this->selectAllProductAttributes = TRUE;
        } else {
            $this->selectAllProductAttributes = FALSE;
        }
    }

    public function getProductAttributes() {
        return ModelsProductAttribute::all();
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $attributes = ModelsProductAttribute::query()
        ->when($this->search, function($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->orderBy($this->sortColumnName, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.products.product-attribute', compact('attributes'));
    }
}
