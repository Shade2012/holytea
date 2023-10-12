<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Tambahkan Model Product
use App\Models\API\Product;

class ProductController extends Controller
{
    //Kita buat View Product
    public function index()
    {
        $products = Product::all();
        return response()->json(['data' => $products]);
    }

    //Kita buat View Product Kalau di cari berdasarkan id

    public function show($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        return response()->json(['data' => $product]);
    }

    //Kita buat function Create data
    public function store(Request $request)
    {
        $product = new Product($request->all());
        $product->uuid = \Str::uuid();
        $product->save();
        return response()-json(['message' => 'Data created successfully', 'data' => $product]);
    }

    //Kita buat update
    public function update(Request $request, $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        $product->update($request->all());
        return response()->json(['message' => 'Data updated successfully', 'data' => $product]);
    }

    //Kita buat function delete
    public function destroy($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        $product->delete();
        return response()->json(['message' => 'Data updated successfully']);
    }
}
