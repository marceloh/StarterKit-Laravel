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
        // dd('store');
        // try {
        //     $request->validate([
        //         'name' => 'required|string|max:255',
        //     ]);
        //     Product::create($request->all());
        //     return back()->toast('This notification comes from the server side =)', 'success');
        // } catch (\Throwable $th) {
        //     return back()->toast('This notification comes from the server side =) ' . $th->getMessage(), 'error');
        // }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd('show');
        // try {
        //     $request->validate([
        //         'descricao' => 'required',
        //         //'username' => 'required'
        //     ]);

        //     $Product = Product::findOrFail($id);
        //     $Product->update($request->all());
        //     //Log::channel('daily')->info('O usuário: '.$request->username.' atualizou o Product de id: '.$Product->id.'!');

        //     return response()->json(['message' => 'Registro atualizado com sucesso!'], 200);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'erro ao tentar atualizar! ' . $e], 500);
        // }
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
