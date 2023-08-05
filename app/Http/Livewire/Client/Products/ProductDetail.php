<?php

namespace App\Http\Livewire\Client\Products;

use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $attributeId;
    public $quantity = 1;

    public function decreaseQty() {
        $this->quantity--;

        if ($this->quantity < 1) {
            $this->quantity = 1;
        }

        $this->emit('updateCartQty', $this->quantity);
    }

    public function increaseQty() {
        $this->quantity++;

        if ($this->quantity > $this->product->stock_qty) {
            $this->quantity = $this->product->stock_qty;
        }

        $this->emit('updateCartQty', $this->quantity);
    }

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

    public function dehydrate()
    {
        $this->dispatchBrowserEvent('initGalery');
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
