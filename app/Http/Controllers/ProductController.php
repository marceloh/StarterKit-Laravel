<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

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
            if($request->id){
                $Product = Product::findOrFail($request->id);
                $Product->update($request->all());
                return back()->toast('This notification comes from the server side =)', 'success');
            }
            Product::create($request->all());
            return back()->toast('This notification comes from the server side =)', 'success');
        } catch (\Throwable $th) {
            return back()->toast('This notification comes from the server side =) ' . $th->getMessage(), 'error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($product)
    {
        dd($product);
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $Product = Product::findOrFail($id);
            $Product->update($request->all());
            return back()->toast('This notification comes from the server side =)', 'success');
        } catch (\Throwable $th) {
            return back()->toast('This notification comes from the server side =) ' . $th->getMessage(), 'error');
        }
    }

    public function modal($type, $position = null, $productId = null)
    {
        $page = [
            'modal' => 'Products/ProductModal',
            'slideover' => 'Products/SlideOver'
        ][$type];

        $product = new Product();
        if($productId != null)
            $product = Product::find($productId);

        return Inertia::modal($page)
            ->with([
                'title' => 'Modal to products!',
                'message' => 'That\'s right! I\'m a modal coming from the far, far away kingdom of the Server...',
                'position' => $position,
                'product' => $product
            ])
            ->baseRoute('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('show');
        // try {
        //     return Product::findOrFail($id);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'erro ao tentar retornar o dado! ' . $e], 404);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            /* $request->validate([
                'username' => 'required'
            ]); */

            $Product = Product::findOrFail($id);
            $Product->delete();
            //Log::channel('daily')->info('O usuário: '.$request->username.' deletou o Product de id: '.$Product->id.'!');

            return back()->toast('This notification comes from the server side =)', '-success');
        } catch(\Throwable $th) {
            return back()->toast('This notification comes from the server side =) ' . $th->getMessage(), 'error');
        }
    }
}
