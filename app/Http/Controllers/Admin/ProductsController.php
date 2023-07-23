<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\uploadImageTrait;
use Illuminate\Support\Str;

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
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request) {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);
        $data['thumbnail'] = $this->uploadOneImage($data['image'], 'products');
        $data['is_active'] = 1;
        $data['category_id'] = $request->input('categories');
        $data['description'] = $request->input('description', '');

       Product::create($data);

        return redirect()->route('admin.products');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact(
            'product', 'categories'
        ));
    }

    public function update(ProductRequest $request, $id) {
        $product = Product::findOrFail($id);
        $data = $request->all();

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = 1;
        $data['category_id'] = $request->input('categories');
        $data['description'] = $request->input('description', 'Đang cập nhật...');

        if ($request->hasFile('image')) {
            $data['thumbnail'] = $this->uploadOneImage($data['image'], 'products');
            $this->deleteImage($product->thumbnail);
        }

        $product->update($data);

        return redirect()->route('admin.product');
    }
}
