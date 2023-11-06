<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255|unique:product_attributes,name',
            ]);

            ProductAttribute::create($data);

            Log::info(auth()->user()->name . ' đã tạo thuộc tính ' . $data['name'] . '.');

            return redirect()->route('admin.attributes.index')->with('success', 'Thêm mới thuộc tính thành công');
        } catch (Exception $ex) {
            Log::alert(auth()->user()->name . ' đã thêm mới thuộc tính thất bại ' . $ex->getMessage());
            return redirect()->route('admin.attributes.index')->with('error', 'Thêm mới thuộc tính thất bại');
        }
    }

    public function edit($id) {
        $attribute = ProductAttribute::findOrFail($id);

        return view('admin.products.attributes.edit', compact('attribute'));
    }

    public function update(Request $request, $id) {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255|unique:product_attributes,name,' . $id,
            ]);

            $attribute = ProductAttribute::findOrFail($id);
            $attribute->update($data);

            Log::info(auth()->user()->name . ' đã cập nhật thuộc tính ' . $attribute->name . '.');

            return redirect()->route('admin.attributes.index')->with('success', 'Cập nhật thuộc tính thành công');
        } catch (Exception $ex) {
            Log::alert(auth()->user()->name . ' đã cập nhật thuộc tính thất bại ' . $ex->getMessage());
            return redirect()->route('admin.attributes.index')->with('error', 'Cập nhật thuộc tính thất bại');
        }
    }
}
