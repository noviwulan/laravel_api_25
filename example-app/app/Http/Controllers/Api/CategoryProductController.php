<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index()
    {
        return response()->json(CategoryProduct::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = CategoryProduct::create($validated);

        return response()->json([
            'type' => 'success',
            'data' => $category
        ], 201);
    }

    public function show($id)
    {
        $category = CategoryProduct::find($id);

        if (!$category) {
            return response()->json([
                'type' => 'error',
                'message' => 'Category tidak ditemukan'
            ], 404);
        }

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = CategoryProduct::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);

        $category->update($validated);

        return response()->json([
            'type' => 'success',
            'data' => $category
        ]);
    }

    public function destroy($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Category berhasil dihapus'
        ]);
    }
}

