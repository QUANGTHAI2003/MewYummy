<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('clients.pages.product', compact('products'));
    }

    public function show($slug, $id)
    {
        $product        = Product::with('categories')->findOrFail($id);
        $productRelated = Product::where('id', '!=', $id)
            ->where('category_id', $product->category_id)
            ->orderBy('id', 'desc')->take(6)->get();
        return view('clients.pages.product_detail', compact('product', 'productRelated'));
    }

}
