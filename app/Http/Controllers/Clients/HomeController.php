<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::with('product_images')
            ->where('is_active', true)
            ->orderBy('id', 'desc')
            ->get();

        $saleProduct      = $products->where('sale_price', '>', 0);
        $meatProduct      = $products->where('category_id', 1);
        $seaFoodProduct   = $products->where('category_id', 2);
        $vegetableProduct = $products->where('category_id', 3);

        return view('clients.pages.home', [
            'saleProduct'      => $saleProduct,
            'meatProduct'      => $meatProduct,
            'seaFoodProduct'   => $seaFoodProduct,
            'vegetableProduct' => $vegetableProduct
        ]);
    }
}
