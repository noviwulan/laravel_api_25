<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'variants'])->get();

        return response()->json([
            'type' => 'success',
            'data' => $products
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_product_id' => 'required|exists:category_products,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric'
        ]);

        $product = Product::create($validated);

        return response()->json([
            'type' => 'success',
            'data' => $product
        ], 201);
    }

    public function show($id)
    {
        $product = Product::with(['category', 'variants'])->find($id);

        if (!$product) {
            return response()->json([
                'type' => 'error',
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'category_product_id' => 'required|exists:category_products,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric'
        ]);

        $product->update($validated);

        return response()->json([
            'type' => 'success',
            'data' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Product berhasil dihapus'
        ]);
    }
}
