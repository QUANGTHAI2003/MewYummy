<?php

namespace App\Http\Livewire\Admin\Products;

use Exception;
use App\Models\Product;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\ProductImages;
use App\Exports\ProductsExport;
use App\Traits\uploadImageTrait;
use App\Traits\tableSortingTrait;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminProducts extends Component {

    use WithPagination;
    use tableSortingTrait;
    use AuthorizesRequests;
    use Actions;
    use uploadImageTrait;

    public string $search    = '';
    public $selectAllProduct = FALSE;
    public $selectedProducts = [];
    public $productId;
    protected $queryString = [
        'search'         => ['except' => ''],
        'sortColumnName' => ['except' => 'id', 'as' => 'sort'],
        'sortDirection'  => ['except' => 'desc', 'as' => 'direction']
    ];
    protected $listeners = ['resetSelected' => 'resetSelected'];

    public function destroyProduct() {
        try {
            try {
                $this->authorize('Delete product');
                $productImage = ProductImages::where('product_id', $this->productId)->get();
                if ($productImage !== null) {
                    foreach ($productImage as $image) {
                        $this->deleteImage($image->image);
                    }
                }

                $product     = Product::where('id', $this->productId)->first();
                if($product !== null) {
                    $productName = $product->name;
                    $product->delete();
                }

                $this->resetSelected();

                $this->notification()->success(
                    $title = 'Đã xóa !!!',
                    $description = 'Đã xóa sản phẩm <strong>' . $productName . '</strong>'
                );
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = 'Đã xảy ra lỗi !!!',
                    $description = 'Bạn không có quyền xóa sản phẩm'
                );
            }
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
            try {
                $this->authorize('Delete product');
                $productsImage = ProductImages::whereIn('product_id', $this->selectedProducts)->get();
                foreach ($productsImage as $productImage) {
                    $this->deleteImage($productImage->image);
                }

                Product::whereIn('id', $this->selectedProducts)->delete();

                $this->resetSelected();

                $this->notification()->success(
                    $title = 'Đã xóa !!!',
                    $description = 'Đã xóa các sản phẩm đã chọn'
                );
                $this->resetSelected();
            } catch (Exception $e) {
                $this->notification()->error(
                    $title = 'Đã xảy ra lỗi !!!',
                    $description = 'Bạn không có quyền xóa các sản phẩm đã chọn'
                );
            }
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
            ->with(['product_images' => function ($query) {
                $query->where('product_images.is_main', true);
            }, 'categories' => function ($query) {
                $query->where('categories.is_active', true);
            }])
            ->when($this->search, function ($query) {
                $query->where('products.name', 'like', '%' . $this->search . '%')
                      ->orWhere('categories.name', 'like', '%' . $this->search . '%');
            })->orderBy($this->sortColumnName, $this->sortDirection)
                     ->paginate($this->perPage);

        return view('livewire.admin.products.admin-products', [
            'products' => $products
        ]);
    }

    public function export() {
        return Excel::download(new ProductsExport(), 'invoices.xlsx');
    }
}
