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
        return Inertia::render('Products/Index', [
            'title' => 'Products',
            'products' => $products
        ]);
    }

    public function modal($type, $position = null)
    {
        $page = [
            'modal' => 'Products/ProductModal',
            'slideover' => 'Products/SlideOver'
        ][$type];

        return Inertia::modal($page)
            ->with([
                'title' => 'Modal to products!',
                'message' => 'That\'s right! I\'m a modal coming from the far, far away kingdom of the Server...',
                'position' => $position
            ])
            ->baseRoute('products.index');
    }

    // public function get_all_product()
    // {
    //     $products = Product::all();
    //     return response()->json([
    //         'products' => $products
    //     ], 200);
    // }
}
