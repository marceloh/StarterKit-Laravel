<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        dd($products);
        return Inertia::render('Products/index', [
            'title' => 'Products',
            'products' => $products,
        ]);
    }

    public function get_all_product()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products
        ], 200);
    }
}
