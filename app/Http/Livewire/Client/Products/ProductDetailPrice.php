<?php

namespace App\Http\Livewire\Client\Products;

use Livewire\Component;

class ProductDetailPrice extends Component
{
    public $product;
    protected $listeners = [
        'updatePrice' => 'updatePrice'
    ];

    public function updatePrice($attributeId)
    {
        // Find the attribute value that matches the selected attribute ID
        $selectedAttributeValue = $this->product->attributeValues->where('id', $attributeId)->first();

        if($selectedAttributeValue->product_attribute_price != 0) {
            $this->product->regular_price = $selectedAttributeValue->product_attribute_price;
        }

        if($selectedAttributeValue->product_attribute_sale_price != 0) {
            $this->product->sale_price = $selectedAttributeValue->product_attribute_sale_price;
        }
        // Check if the sale price is greater than the regular price and swap their values if necessary
        if ($this->product->sale_price > $this->product->regular_price) {
            $temp = $this->product->sale_price;
            $this->product->sale_price = $this->product->regular_price;
            $this->product->regular_price = $temp;
        }
    }
    public function render()
    {
        $price = getPrice($this->product->regular_price, $this->product->sale_price);
        return view('livewire.client.products.product-detail-price', [
            'price' => $price,
        ]);
    }
}
