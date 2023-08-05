<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    public function __construct() {
        $this->middleware('permission:View attributes|Create attributes|Edit attributes|Delete attributes', ['only' => ['index', 'show']]);
        $this->middleware('permission:Create attributes', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit attributes', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete attributes', ['only' => ['destroy']]);
    }

    public function index() {
        return view('admin.products.attributes.index');
    }

    public function create() {
        return view('admin.products.attributes.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:product_attributes,name',
        ]);

        ProductAttribute::create($data);

        return redirect()->route('admin.attributes.index')->with('success', 'Thêm mới thuộc tính thành công');
    }

    public function edit($id) {
        $attribute = ProductAttribute::findOrFail($id);

        return view('admin.products.attributes.edit', compact('attribute'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:product_attributes,name,' . $id,
        ]);

        $attribute = ProductAttribute::findOrFail($id);
        $attribute->update($data);

        return redirect()->route('admin.attributes.index')->with('success', 'Cập nhật thuộc tính thành công');
    }
}
