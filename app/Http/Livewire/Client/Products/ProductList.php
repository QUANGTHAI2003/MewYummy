<?php

namespace App\Http\Livewire\Client\Products;

use App\Models\Product;
use Livewire\Component;
use App\Traits\tableSortingTrait;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    private $products;
    protected $paginationTheme = 'bootstrap';
    public $sortColumn = 'id';
    public $sortDirection = 'desc';
    public $categoryId = null;
    public $minPrice = 0;
    public $maxPrice;
    protected $queryString = [
        'sortColumn' => ['except' => 'id', 'as' => 'sort'],
        'sortDirection' => ['except' => 'asc', 'as' => 'direction'],
        'categoryId' => ['except' => null, 'as' => 'category'],
        'minPrice' => ['except' => 0, 'as' => 'min'],
        'maxPrice' => ['except' => null, 'as' => 'max'],
    ];

    protected $listeners = [
        'sortCategory' => 'sortCategory',
        'applySortPrice' => 'applySortPrice',
        'clearAllSort' => 'clearAllSort',
    ];

    public function clearAllSort() {
        $this->reset(['categoryId', 'minPrice', 'maxPrice', 'sortColumn', 'sortDirection']);
    }

    public function sortCategory($id) {
        $this->categoryId = $id;
    }

    public function applySortPrice($minPrice, $maxPrice) {
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
    }

    public function sortRadio($sort) {
        $sortData = explode('|', $sort);
        $this->sortColumn = $sortData[0];
        $this->sortDirection = $sortData[1];
    }

    public function mount($products)
    {
        $this->products = $products;
    }

    public function render()
    {
        $this->products = Product::query()
            ->when($this->categoryId, function ($query) {
                return $query->where('category_id', $this->categoryId);
            })
            ->when($this->minPrice, function ($query) {
                return $query->where('regular_price', '>=', $this->minPrice);
            })
            ->when($this->maxPrice, function ($query) {
                return $query->where('regular_price', '<=', $this->maxPrice);
            })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(12);


        return view('livewire.client.products.product-list', [
            'products' => $this->products
        ]);
    }
}
