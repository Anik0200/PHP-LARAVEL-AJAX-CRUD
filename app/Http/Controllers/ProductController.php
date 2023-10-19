<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'  => 'required|max:100',
                'price' => 'required'
            ],

            [
                'name'  => 'NAME IS REQUIRED',
                'price' => 'PRICE IS REQUIRED',
            ]
        );

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return response()->json([

            'status' => 'success',
            'massage' => 'PRODUCT ADDED!',

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function productsUpdate(Request $request)
    {
        $product = Product::find($request->up_id);

        if (!$product) {

            return "CANT'T EDIT";
        }

        $request->validate(
            [
                'upName'  => 'nullable|max:100',
                'upPrice' => 'nullable'
            ],

            [
                'upName'  => 'NAME IS REQUIRED',
                'upPrice' => 'PRICE IS REQUIRED',
            ]
        );

        $product->update([
            'name' => $request->upName,
            'price' => $request->upPrice,
        ]);

        return response()->json([

            'status' => 'success',
            'massage' => 'PRODUCT UPDATED!',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function productsDel(Request $request)
    {

        $product = Product::find($request->product_id);

        $product->delete();

        return response()->json([

            'status' => 'success',
            'massage' => 'PRODUCT DELETED!',

        ]);
    }

    public function productsPaginate(Request $request)
    {
        $products = Product::latest()->paginate(5);
        return view('productPagination', compact('products'))->render();
    }

    public function searchProduct(Request $request)
    {
        ////
        $products = Product::where('name', 'like', '%' . $request->searchStr . '%')
            ->orWhere('price', 'like', '%' . $request->searchStr . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        if (count($products) > 0) {

            return view('productPagination', compact('products'))->render();
        } else {

            return response()->json([

                'status' => 'NOT FOUND!',

            ]);
        }
        /////
    }
}
