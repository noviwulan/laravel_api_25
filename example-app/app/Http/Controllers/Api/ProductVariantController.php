<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index()
    {
        return response()->json(ProductVariant::with('product')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $variant = ProductVariant::create($validated);

        return response()->json([
            'type' => 'success',
            'data' => $variant
        ], 201);
    }

    public function show($id)
    {
        $variant = ProductVariant::with('product')->find($id);

        if (!$variant) {
            return response()->json([
                'type' => 'error',
                'message' => 'Varian tidak ditemukan'
            ], 404);
        }

        return response()->json($variant);
    }

    public function update(Request $request, $id)
    {
        $variant = ProductVariant::findOrFail($id);

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $variant->update($validated);

        return response()->json([
            'type' => 'success',
            'data' => $variant
        ]);
    }

    public function destroy($id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variant->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Varian berhasil dihapus'
        ]);
    }
}
