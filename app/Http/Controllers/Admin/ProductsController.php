<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Traits\uploadImageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductsController extends Controller {

    use uploadImageTrait;

    public function __construct() {
        $this->middleware('permission:View products', ['only' => ['index']]);
        $this->middleware('permission:Create product', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete product', ['only' => ['destroy']]);
    }

    public function index() {
        return view('admin.products.index');
    }

    public function create() {
        // $categories = Category::where('is_active', true)->get();

        return view('admin.products.create');
    }

    public function store(Request $request) {
        dd($request->all());
        $data = $request->validated();

        $dataProduct = [
            'name'          => $data['name'],
            'slug'          => Str::slug($data['name']),
            'regular_price' => $data['regular_price'],
            'sale_price'    => $data['sale_price'],
            'stock_qty'     => $data['stock_qty'],
            'category_id'   => $request->input('categories'),
            'description'   => $request->input('description', 'Đang cập nhật...')
        ];

        $product = Product::create($dataProduct);

        if ($request->hasFile('image')) {
            $mainImage = [
                'product_id' => $product->id,
                'image'      => $this->uploadOneImage($data['image'], 'products'),
                'is_main'    => 1
            ];

            ProductImages::create($mainImage);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit($id) {
        $product    = Product::with('product_images')->findOrFail($id);
        $categories = Category::where('is_active', true)->get();

        return view('admin.products.edit', compact(
            'product', 'categories'
        ));
    }

    public function update(ProductRequest $request, $id) {
        // update
        $data = $request->validated();

        $dataProduct = [
            'name'          => $data['name'],
            'slug'          => Str::slug($data['name']),
            'regular_price' => $data['regular_price'],
            'sale_price'    => $data['sale_price'],
            'stock_qty'     => $data['stock_qty'],
            'category_id'   => $request->input('categories'),
            'description'   => $request->input('description', 'Đang cập nhật...')
        ];

        $product = Product::findOrFail($id);
        $product->update($dataProduct);


        // update
        if ($request->hasFile('image')) {
            $mainImage = [
                'product_id' => $product->id,
                'image'      => $this->uploadOneImage($data['image'], 'products'),
                'is_main'    => 1
            ];

            ProductImages::updated($mainImage);
        }

        return redirect()->route('admin.products.index');
    }
}
