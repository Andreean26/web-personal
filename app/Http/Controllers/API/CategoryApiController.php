<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryApiController extends Controller
{
    //
    public function index()
    {
        $category = category::all();
        return response()->json([
            'category' => $category,

        ]);

    }

    public function create(Request $request)
    {

        $category = category::create($request->all());
        return response()->json([
            'message' => 'Category berhasil ditambahkan',
            'category' => $category
        ]);
    }

    public function edit(Request $request)
    {
        $category = category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return response()->json([
            'message' => 'Category berhasil diubah',
            'category' => $category
        ]);
    }

    public function delete(Request $request, $id)
    {
        category::destroy($id);
        return response()->json([
            'message' => 'Category berhasil dihapus',
        ]);
    }
}
