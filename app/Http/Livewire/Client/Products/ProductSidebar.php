<?php

namespace App\Http\Livewire\Client\Products;

use Livewire\Component;
use App\Models\Category;

class ProductSidebar extends Component
{
    public $minPrice;
    public $maxPrice;
    public $sortData = [
        'category_id' => null,
        'min_price' => null,
        'max_price' => null,
        'sort_column' => 'id',
        'sort_direction' => 'asc',
    ];

    public function applySortPrice()
    {
        $this->minPrice = str_replace('.', '', $this->minPrice);
        $this->maxPrice = str_replace('.', '', $this->maxPrice);
        $this->sortData['min_price'] = $this->minPrice;
        $this->sortData['max_price'] = $this->maxPrice;
        $this->emitTo('client.products.product-list', 'applySortPrice', $this->minPrice, $this->maxPrice);
    }

    public function clearAllSort()
    {
        $this->reset();
        $this->emitTo('client.products.product-list', 'clearAllSort');
    }


    public function sortCategory($id)
    {
        $this->sortData['category_id'] = $id;
        $this->emitTo('client.products.product-list', 'sortCategory', $id);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.client.products.product-sidebar', compact('categories'));
    }
}
