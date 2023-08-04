<?php

namespace App\Http\Livewire\Client\Products;

use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $attributeId;

    public function getAttributeValue()
    {
        return $this->product->attributeValues->unique('product_attribute_id');
    }

    public function getSubImage()
    {
        return $this->product->product_images;
    }

    public function getAttributeValueId($attriId)
    {
        $this->attributeId = $attriId;
        $this->emit('updatePrice', $this->attributeId);
        $this->emit('updateQuantity', $this->attributeId);
    }


    public function render()
    {
        return view('livewire.client.products.product-detail', [
            'attributeValues' => $this->getAttributeValue(),
            'subImages'       => $this->getSubImage(),
            'product'         => $this->product
        ]);
    }
}
