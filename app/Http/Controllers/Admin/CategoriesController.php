<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{

    public $category;

    public function __construct()
    {
        $this->category = new Category();
        $this->middleware('permission:view_categories', ['only' => ['index']]);
        $this->middleware('permission:create_category', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_category', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoriesRequest $request)
    {
        try {
            $slug = $request->slug ? $request->slug : Str::slug($request->name);

            $data = [
                'name' => $request->input('name'),
                'slug' => $slug,
                'is_active' => true
            ];

            $category = new Category();
            $category->addProduct($data);

            return redirect()
                ->route('admin.categories')
                ->with('success', 'Thêm mới danh mục thành công');
        } catch (Exception $ex) {
            return redirect()
                ->route('admin.categories')
                ->with('error', 'Thêm mới danh mục thất bại');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoriesRequest $request, $id)
    {
        try {
            $slug = $request->slug ? $request->slug : Str::slug($request->name);

            $data = [
                'name' => $request->name,
                'slug' => $slug,
                'is_active' => true
            ];

            $this->category->updateProduct($data, $id);

            return redirect()
                ->route('admin.categories')
                ->with('success', 'Cập nhật danh mục thành công');
        } catch (Exception $ex) {
            return redirect()
                ->route('admin.categories')
                ->with('error', 'Cập nhật danh mục thất bại');
        }
    }

    public function destroy($id)
    {
        try {
            $this->category->deleteProduct($id);

            return redirect()
                ->route('admin.categories')
                ->with('success', 'Xóa danh mục thành công');
        } catch (Exception $ex) {
            return redirect()->route('admin.categories')->with('error', 'Xóa danh mục thất bại');
        }
    }
}
