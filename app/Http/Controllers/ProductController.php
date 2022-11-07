<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Products', [
            'title' => 'Products',
            'products' => $products
        ]);
    }

    // public function get_all_product()
    // {
    //     $products = Product::all();
    //     return response()->json([
    //         'products' => $products
    //     ], 200);
    // }
}
