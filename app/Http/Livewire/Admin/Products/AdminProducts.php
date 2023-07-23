<?php

namespace App\Http\Livewire\Admin\Products;

use App\Exports\ProductsExport;
use App\Traits\uploadImageTrait;
use Exception;
use App\Models\Product;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Traits\tableSortingTrait;
use Maatwebsite\Excel\Facades\Excel;

class AdminProducts extends Component {

    use WithPagination;
    use tableSortingTrait;
    use Actions;
    use uploadImageTrait;

    public string $search    = '';
    public $selectAllProduct = FALSE;
    public $selectedProducts = [];
    public $productId;
    protected $queryString = [
        'search' => ['except' => '']
    ];
    protected $listeners = ['resetSelected' => 'resetSelected'];

    public function destroyProduct() {
        try {
            $product     = Product::findOrFail($this->productId);
            $productName = $product->name;
            $product->delete();
            $this->deleteImage($product->thumbnail);

            $this->notification()->success(
                $title = 'Đã xóa !!!',
                $description = 'Đã xóa sản phẩm <strong>' . $productName . '</strong>'
            );
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Đã xảy ra lỗi !!!',
                $description = 'Xóa sản phẩm thất bại'
            );
        }
    }

    public function deleteSelectedProduct($productId) {
        $this->productId = $productId;
    }

    public function deleteSelected() {
        try {
            $products = Product::whereIn('id', $this->selectedProducts)->get();
            foreach ($products as $product) {
                $this->deleteImage($product->thumbnail);
            }
            Product::whereIn('id', $this->selectedProducts)->delete();


            $this->resetSelected();
            $this->notification()->success(
                $title = 'Đã xóa !!!',
                $description = 'Đã xóa các sản phẩm đã chọn'
            );
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Đã xảy ra lỗi !!!',
                $description = 'Xóa các sản phẩm đã chọn thất bại'
            );
        }

    }

    public function resetSelected() {
        $this->selectAllProduct = FALSE;
        $this->selectedProducts = [];
    }

    public function updatedSelectAllProduct($value) {
        if ($value) {
            $this->selectedProducts = $this->getProducts()->pluck('id')->map(fn($id) => (string) $id);
        } else {
            $this->selectedProducts = [];
        }
    }

    public function getProducts() {
        return Product::all();
    }

    public function updatedSelectedProducts($value) {
        if ($value && count($value) === $this->getProducts()->count()) {
            $this->selectAllProduct = TRUE;
        } else {
            $this->selectAllProduct = FALSE;
        }
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render() {
        $products = Product::query()
            ->select('products.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->when($this->search, function ($query) {
                $query->where('products.name', 'like', '%' . $this->search . '%')
                      ->orWhere('categories.name', 'like', '%' . $this->search . '%');
            })
                     ->orderBy($this->sortColumnName, $this->sortDirection)
                     ->paginate($this->perPage);

        return view('livewire.admin.products.admin-products', [
            'products' => $products
        ]);
    }

    public function export() {
        return Excel::download(new ProductsExport, 'invoices.xlsx');
    }
}
