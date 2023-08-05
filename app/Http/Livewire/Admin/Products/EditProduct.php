<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImages;
use Livewire\WithFileUploads;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Traits\uploadImageTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditProduct extends Component
{
    use WithFileUploads;
    use uploadImageTrait;
    use AuthorizesRequests;

    public string $name       = '';
    public string $slug       = '';
    public int $regular_price = 0;
    public int $sale_price    = 0;
    public int $stock_qty     = 0;
    public bool $is_active    = true;
    public $description       = '';
    public $category_id       = '';
    public $image;
    public $images = [];
    public $new_image;
    public $new_images = [];
    public $product_id;

    public $attr          = '';
    public $inputs        = [];
    public $attribute_arr = [];
    public $attribute_values;
    public $allAttributeValues                 = [];
    public $attribute_value_options_price      = [];
    public $attribute_value_options_sale_price = [];
    public $attribute_value_options_quantity   = [];

    public $haveAttribute = false;

    public function mount($id)
    {
        $product = Product::with('attributeValues')->where('id', $id)->first();

        $this->name             = $product->name;
        $this->slug             = $product->slug;
        $this->regular_price    = $product->regular_price;
        $this->sale_price       = $product->sale_price;
        $this->stock_qty        = $product->stock_qty;
        $this->is_active        = $product->is_active;
        $this->description      = $product->description;
        $this->category_id      = $product->category_id;
        $this->image            = $product->image;
        $this->images           = $product->images;
        $this->product_id       = $product->id;
        $this->attribute_values = $product->attributeValues->groupBy('product_attribute_id')->toArray();
        $this->haveAttribute    = count($this->attribute_values) > 0 ? true : false;

        if ($this->haveAttribute) {
            $this->inputs        = $product->attributeValues->where('product_id', $product->id)->unique('product_attribute_id')->pluck('product_attribute_id')->toArray();
            $this->attribute_arr = $product->attributeValues->where('product_id', $product->id)->unique('product_attribute_id')->pluck('product_attribute_id')->toArray();

            foreach ($this->attribute_arr as $k => $a_arr) {
                $allAttributeValue = AttributeValue::where('product_id', $product->id)
                    ->where('product_attribute_id', $a_arr)
                    ->pluck('product_attribute_value')
                    ->implode(',');
                $this->attribute_values[$a_arr] = $allAttributeValue;
            }

            $this->allAttributeValues                 = $product->attributeValues->pluck('product_attribute_value')->toArray();
            $this->attribute_value_options_price      = array_combine($this->allAttributeValues, $product->attributeValues->pluck('product_attribute_price')->toArray());
            $this->attribute_value_options_sale_price = array_combine($this->allAttributeValues, $product->attributeValues->pluck('product_attribute_sale_price')->toArray());
            $this->attribute_value_options_quantity   = array_combine($this->allAttributeValues, $product->attributeValues->pluck('product_attribute_quantity')->toArray());
        }
    }

    public function updateProduct()
    {
        $this->authorize('Update product');
        $product                = Product::find($this->product_id);
        $product->name          = $this->name;
        $product->slug          = $this->slug;
        $product->regular_price = $this->regular_price;
        $product->sale_price    = $this->sale_price;
        $product->stock_qty     = $this->stock_qty;
        $product->is_active     = $this->is_active;
        $product->description   = $this->description;
        $product->category_id   = $this->category_id;
        if ($this->new_image) {
            $new_image      = $this->uploadImage($this->new_image, 'products');
            $product->image = $new_image;
        }
        if ($this->new_images) {
            foreach ($this->new_images as $new_image) {
                $new_images     = $this->uploadImage($new_image, 'products');
                $this->images[] = $new_images;
            }
        }
        $product->save();

        AttributeValue::where('product_id', $this->product_id)->delete();

        if ($this->haveAttribute) {
            $attributeValues = collect($this->attribute_values)->flatMap(function ($attrValues, $attrId) use ($product) {
                $attribute = ProductAttribute::find($attrId);

                return collect(explode(',', $attrValues))->map(function ($value) use ($attribute, $product) {
                    $price      = $this->attribute_value_options_price[$value] ?? 0;
                    $sale_price = $this->attribute_value_options_sale_price[$value] ?? 0;
                    $quantity   = $this->attribute_value_options_quantity[$value] ?? 0;

                    return [
                        'product_id'                   => $product->id,
                        'product_attribute_id'         => $attribute->id,
                        'product_attribute_value'      => $value,
                        'product_attribute_price'      => $price,
                        'product_attribute_sale_price' => $sale_price,
                        'product_attribute_quantity'   => $quantity
                    ];
                });
            });

            AttributeValue::insert($attributeValues->all());
        }

        return redirect()->route('admin.products.index');
    }

    public function add()
    {
        if (!in_array($this->attr, $this->attribute_arr)) {
            array_push($this->inputs, $this->attr);
            array_push($this->attribute_arr, $this->attr);
        }
    }

    public function toggleHaveAttribute()
    {
        $this->haveAttribute = !$this->haveAttribute;
    }

    public function remove()
    {
        $this->inputs = collect($this->inputs)->reject(function ($value) {
            return $value == $this->attr;
        });
        $this->attribute_arr = collect($this->attribute_arr)->reject(function ($value) {
            return $value == $this->attr;
        });
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function render()
    {
        $categories   = Category::all();
        $pattributes  = ProductAttribute::all();
        $productImage = ProductImages::where('product_id', $this->product_id)->get();
        return view('livewire.admin.products.edit-product', [
            'categories'   => $categories,
            'attributes'   => $pattributes,
            'productImage' => $productImage
        ]);
    }
}
