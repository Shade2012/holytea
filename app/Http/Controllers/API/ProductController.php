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

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return response()->json(['data' => $product]);
    }

    //Kita buat function Create data
    public function store(Request $request)
    {
        $data = $request->all();
        $data['product_code'] = $this->generateProductCode(); // Replace with your logic for generating product codes

        $product = new Product($request->all());
        $product->save();
        return response()-json(['message' => 'Data created successfully', 'data' => $product]);
    }

    //Kita buat update
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $product->update($request->all());
        return response()->json(['message' => 'Data updated successfully', 'data' => $product]);
    }

    //Kita buat function delete
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return response()->json(['message' => 'Data updated successfully']);
    }

    private function generateProductCode()
    {
        // Implement your own logic to generate product codes
        // For example, you might generate a random string, concatenate with date, etc.
        return 'P' . date('YmdHis') . mt_rand(1000, 9999);
    }
}
