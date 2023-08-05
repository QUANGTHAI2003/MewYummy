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
use App\Traits\CreateProductData;

class CreateProduct extends Component
{
    use WithFileUploads;
    use uploadImageTrait;
    use CreateProductData;

    public string $name       = '';
    public string $slug       = '';
    public int $regular_price = 0;
    public int $sale_price    = 0;
    public int $stock_qty     = 0;
    public bool $is_active    = true;
    public $description       = '';
    public $category_id       = '';
    public $image;
    public $images;

    public function mount()
    {
        $this->is_active   = true;
        $this->category_id = '';
    }

    public $attr          = '';
    public $inputs        = [];
    public $attribute_arr = [];
    public $attribute_values;
    public $allAttributeValues                 = [];
    public $attribute_value_options_price      = [];
    public $attribute_value_options_sale_price = [];
    public $attribute_value_options_quantity   = [];


    public $haveAttribute = false;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function attributeValue()
    {
        $this->allAttributeValues = array_reduce($this->attribute_values, function ($carry, $item) {
            $values = explode(',', $item);
            return array_merge($carry, $values);
        }, []);

        $this->allAttributeValues = array_unique($this->allAttributeValues);
    }

    public function addProduct()
    {
        $this->validate();

        $product = Product::create([
            'category_id'   => $this->category_id,
            'name'          => $this->name,
            'slug'          => $this->slug ?: Str::slug($this->name),
            'regular_price' => $this->regular_price,
            'sale_price'    => $this->sale_price,
            'stock_qty'     => $this->stock_qty,
            'is_active'     => $this->is_active,
            'description'   => $this->description
        ]);

        ProductImages::create([
            'product_id' => $product->id,
            'image'      => $this->uploadOneImage($this->image, 'products'),
            'is_main'    => 1
        ]);

        if ($this->images) {
            foreach ($this->images as $image) {
                ProductImages::create([
                    'product_id' => $product->id,
                    'image'      => $this->uploadOneImage($image, 'products'),
                    'is_main'    => 0
                ]);
            }
        }

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

        $this->reset();

        return redirect()->route('admin.products.index');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function toggleHaveAttribute()
    {
        $this->haveAttribute = !$this->haveAttribute;
    }

    public function add()
    {
        if (!in_array($this->attr, $this->attribute_arr)) {
            array_push($this->inputs, $this->attr);
            array_push($this->attribute_arr, $this->attr);
        }
    }

    public function remove($index)
    {
        unset($this->inputs[$index]);
        unset($this->attribute_arr[$index]);
    }

    public function render()
    {
        $categories = Category::where('is_active', true)->get();
        $attributes = ProductAttribute::all();

        return view('livewire.admin.products.create-product', [
            'categories' => $categories,
            'attributes' => $attributes
        ]);
    }
}
