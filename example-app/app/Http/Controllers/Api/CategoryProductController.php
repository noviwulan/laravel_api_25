<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    //
    public function index(){
        $category=CategoryProduct::all();
        return response()->json($category);
    }

    // simpan
    public function store(Request $request){
        $validateData = $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|string',
        ]);
        $category=CategoryProduct::create($validateData);
        return response()->json([
            'type'=>'succes',
            'data'=>$category,
        ],201);
    }

    public function show($id){
        $category = CategoryProduct::find($id);
        if (!$category){
            return response()->json([
                'type'=>'succes',
                'data'=>null,
                'message'=>'data tidak ditemukan'
            ],401);
        }
        return response()->json($category);
    }

    public function update(Request $request,$id){
        $category = CategoryProduct::find($id);
        $validateData = $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|string',
        ]);
        $category -> update($validateData);
        return response()->json([
            'type'=>'succes',
            'data'=>$category,
        ],201);
    }

    public function destroy($id){
        $category = CategoryProduct::find($id);
        $category -> delete();
        return response()->json([
            'type'=>'succes',
            'data'=>$category,
        ],401);        
    }
}
