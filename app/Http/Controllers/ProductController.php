<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use stdClass;

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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            Product::create($request->all());
            return back()->toast('This notification comes from the server side =)', 'success');
        } catch (\Throwable $th) {
            return back()->toast('This notification comes from the server side =) ' . $th->getMessage(), 'error');
        }
    }

    public function modal($type, $position = null)
    {
        $page = [
            'modal' => 'Products/ProductModal',
            'slideover' => 'Products/SlideOver'
        ][$type];

        $product = new Product();

        return Inertia::modal($page)
            ->with([
                'title' => 'Modal to products!',
                'message' => 'That\'s right! I\'m a modal coming from the far, far away kingdom of the Server...',
                'position' => $position,
                'product' => $product
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
