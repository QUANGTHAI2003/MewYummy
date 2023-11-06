<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{

    public $category;

    public function __construct()
    {
        $this->category = new Category();
        $this->middleware('permission:View categories', ['only' => ['index']]);
        $this->middleware('permission:Create category', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update category', ['only' => ['edit', 'update']]);
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
            $category->addProdut($data);

            Log::info(auth()->user()->name . ' đã tạo danh mục ' . $data['name'] . '.');

            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Thêm mới danh mục thành công');
        } catch (Exception $ex) {
            Log::alert(auth()->user()->name . ' đã thêm mới danh mục thất bại. ' . $ex->getMessage());
            return redirect()
                ->route('admin.categories.index')
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

            Log::info(auth()->user()->name . ' đã cập nhật danh mục ' . $data['name'] . '.');

            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Cập nhật danh mục thành công');
        } catch (Exception $ex) {
            Log::alert(auth()->user()->name . ' đã cập nhật danh mục thất bại. ' . $ex->getMessage());
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Cập nhật danh mục thất bại');
        }
    }

    public function destroy($id)
    {
        try {
            $this->category->deleteProduct($id);

            Log::info(auth()->user()->name . ' đã xóa danh mục có id ' . $id . '.');

            return redirect()
                ->route('admin.categories')
                ->with('success', 'Xóa danh mục thành công');
        } catch (Exception $ex) {
            Log::alert(auth()->user()->name . ' đã xóa danh mục thất bại. ' . $ex->getMessage());

            return redirect()->route('admin.categories.ondex')->with('error', 'Xóa danh mục thất bại');
        }
    }
}
