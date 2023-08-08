<?php

namespace App\Http\Livewire\Client\Products;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Brick\Math\BigInteger;
use Brick\Math\BigNumber;
use Ramsey\Uuid\Type\Integer;

class ProductSidebar extends Component
{
    public $minPrice;
    public $maxPrice;
    public $sortData = [];

    protected $listeners = [
        'sortRadio' => 'sortRadio',
    ];

    public function sortRadio($sortColumn, $sortDirection)
    {
        $this->sortData['sortColumn'] = $sortColumn;
        $this->sortData['sortDirection'] = $sortDirection;
    }

    public function applySortPrice()
    {
        $this->minPrice = str_replace('.', '', $this->minPrice) ?: 0;
        $this->maxPrice = str_replace('.', '', $this->maxPrice) ?: Product::max('regular_price');
        $this->sortData['minPrice'] = $this->minPrice;
        $this->sortData['maxPrice'] = $this->maxPrice;
        $this->emitTo('client.products.product-list', 'applySortPrice', $this->minPrice, $this->maxPrice);
    }

    public function clearAllSort()
    {
        $this->reset();
        $this->emitTo('client.products.product-list', 'clearAllSort');
    }

    public function clearSort($keySort)
    {
        $this->reset($keySort);
        $this->emitTo('client.products.product-list', 'clearSort', $keySort);
    }


    public function sortCategory($id)
    {
        $this->sortData['categoryId'] = $id;
        $this->emitTo('client.products.product-list', 'sortCategory', $id);
    }

    private function getSelectedFilters()
    {
        $selectedFilters = [];

        foreach ($this->sortData as $key => $value) {
            switch ($key) {
                case 'categoryId':
                    $category = Category::find($value);
                    if ($category) {
                        $selectedFilters[$key] = $category->name;
                    }
                    break;
                case 'minPrice':
                    $selectedFilters[$key] = 'Giá từ ' . formatNumber($value);
                    break;
                case 'maxPrice':
                    $selectedFilters[$key] = 'Giá đến ' . formatNumber($value);
                    break;
                case 'sortColumn':
                    switch ($value) {
                        case 'price':
                            $selectedFilters[$key] = 'Giá';
                            break;
                        case 'name':
                            $selectedFilters[$key] = 'Tên';
                            break;
                        case 'created_at':
                            $selectedFilters[$key] = 'Ngày tạo';
                            break;
                    }
                    break;
                case 'sortDirection':
                    switch ($value) {
                        case 'asc':
                            $selectedFilters[$key] = 'Tăng dần';
                            break;
                        case 'desc':
                            $selectedFilters[$key] = 'Giảm dần';
                            break;
                    }
                    break;
                case 'search':
                    $selectedFilters[$key] = 'Tìm kiếm: ' . $value;
                    break;
            }
        }

        return $selectedFilters;
    }

    public function render()
    {
        $categories = Category::all();
        $selectedFilters = $this->getSelectedFilters();
        return view('livewire.client.products.product-sidebar', compact('categories', 'selectedFilters'));
    }
}
