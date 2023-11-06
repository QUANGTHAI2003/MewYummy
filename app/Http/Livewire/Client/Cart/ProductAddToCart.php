<?php

namespace App\Http\Livewire\Client\Cart;

use App\Models\Product;
use Livewire\Component;
use WireUi\Traits\Actions;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductAddToCart extends Component
{
    use Actions;
    public $product;
    public $quantity;
    protected $listeners = [
        'updateQuantity' => 'updateQuantity',
        'cartQuantity'   => 'cartQuantity'
    ];

    public function cartQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function store($productId)
    {
        $product = Product::with(['product_images', 'attributeValues'])->find($productId);

        $attributeValue = $product->attributeValues->first();
        $name           = $attributeValue ? $product->name . ' -  (' . $attributeValue->product_attribute_value . ')' : $product->name;
        $price          = $attributeValue ? $attributeValue->product_attribute_price : $product->regular_price;
        $salePrice      = $attributeValue ? $attributeValue->product_attribute_sale_price : $product->sale_price;

        if ($salePrice) {
            $price = $salePrice;
        }

        if ($product->stock_qty != 0) {
            Cart::instance('cart')->add([
                'id'      => $product->id,
                'name'    => $name,
                'qty'     => $this->quantity,
                'price'   => $price,
                'weight'  => 0,
                'options' => [
                    'image'        => $product->product_images->first()->image,
                    'sale_price'   => $product->sale_price,
                    'sale_percent' => $product->sale_percent
                ]
            ])->associate('App\Models\Product');
        }

        session('success', 'Thêm sản phẩm vào giỏ hàng thành công');

        $this->emit('cartUpdated');
    }

    public function updateQuantity($attributeId)
    {
        $selectedAttributeValue = $this->product->attributeValues->where('id', $attributeId)->first();

        $this->product->stock_qty = $selectedAttributeValue->product_attribute_quantity;
    }

    public function render()
    {
        return view('livewire.client.cart.product-add-to-cart', [
            'product' => $this->product
        ]);
    }
}
