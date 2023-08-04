<?php

namespace App\Http\Livewire\Client\Products;

use Livewire\Component;

class ProductDetailQuantity extends Component
{
    public $product;
    protected $listeners = [
        'updateQuantity' => 'updateQuantity'
    ];


    public function updateQuantity($attributeId)
    {
        // Find the attribute value that matches the selected attribute ID
        $selectedAttributeValue = $this->product->attributeValues->where('id', $attributeId)->first();

        // Update the product quantity with the selected attribute value's quantity
        $this->product->stock_qty = $selectedAttributeValue->product_attribute_quantity;
    }

    public function render()
    {
        return view('livewire.client.products.product-detail-quantity', [
            'product' => $this->product
        ]);
    }
}
