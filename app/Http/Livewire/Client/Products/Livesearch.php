<?php

namespace App\Http\Livewire\Client\Products;

use App\Models\Product;
use Livewire\Component;

class Livesearch extends Component
{
    public $term = "";

    public function render()
    {
        $products = Product::with('product_images')->where('name', 'like', '%' . $this->term . '%')->take(5)->get();
        if($products) {
            $this->dispatchBrowserEvent('product-search');
        } else {
            $this->dispatchBrowserEvent('product-search-failed');
        }

        return view('livewire.client.products.livesearch', [
            'products' => $products,
        ]);
    }
}
