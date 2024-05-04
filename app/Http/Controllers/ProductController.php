<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // public function index()
    // {
    //     $products = Product::all();
    //     return view('products.index', compact('products'));
    // }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }


    public function create()
    {

        $product = Product::all();
        return view('products.create',compact('product'));
    }

    // public function show($id) 
    // {
    //     $product = Product::findOrFail($id);
    //     return view('products.show', compact('product'));
    // }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    // public function store(Request $request)
    // {
    // Product::create($request->all());
    // return response()->json(['message' => 'Produk berhasil disimpan'], 201);
    // }

    // public function store(Request $request)
    // {
    //     $product = Product::create($request->all());
    //     $product = session()->get('product', []);
    //     if(isset($product[$request])) {
    //         $product[$request]['stock']++;
    //     } else {
    //         $product[$request] = [
    //             "name" => $product->name,
    //             "stock" => 1,
    //             "price" => $product->price,
    //         ];
    //     }
    //     session()->put('product', $product);
    //     return redirect()->back()->with('success', 'Book has been added to cart!');
    // }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('/products')->with('success', 'Produk berhasil diupdate!');
    }

    // public function update(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);
    //     $product->update($request->all());
    //     return response()->json(['message' => 'Produk berhasil diupdate'], 200);
    // }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus!');
    }
}
