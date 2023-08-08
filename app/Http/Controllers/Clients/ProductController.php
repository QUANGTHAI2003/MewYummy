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
        $product = Product::with('categories')
            ->withCount('comments')
            ->findOrFail($id);

        // dd($product->toArray());


        $productRelated = Product::with([
            'categories',
            'product_images'
        ])
            ->where('id', '!=', $id)
            ->where('category_id', $product->category_id)
            ->orderBy('id', 'desc')->take(6)->get();

        // dd($product->toArray());
        return view('clients.pages.product_detail', compact('product', 'productRelated'));
    }

}
