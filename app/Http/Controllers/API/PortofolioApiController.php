<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\portofolio;
use App\Http\Controllers\Controller;

class PortofolioApiController extends Controller
{
    //
    public function index()
    {
        $portofolio = portofolio::with('category')->get();

        $dataPortofolio = [];
        foreach ($portofolio as $key => $value) {
            $dataPortofolio[$key] = [
                'id' => $value->id,
                'title' => $value->title,
                'image' => $value->image,
                'description' => $value->description,
                'category_name' => $value->category->name,
                'category_id' => $value->category_id,
            ];
        }

        return response()->json([


        ]);

    }

    public function create(Request $request)
    {

        $portofolio = portofolio::create($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $portofolio->image = $request->file('image')->getClientOriginalName();
            $portofolio->save();
        }

        return response()->json([
            'message' => 'Portofolio berhasil ditambahkan',
            'portofolio' => $portofolio
        ]);
    }

    public function edit(Request $request)
    {
        $portofolio = portofolio::find($request->id);
        $portofolio->title = $request->title;
        $portofolio->description = $request->description;
        $portofolio->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $portofolio->image = $request->file('image')->getClientOriginalName();
        }
        $portofolio->save();
        return response()->json([
            'message' => 'Portofolio berhasil diubah',
            'portofolio' => $portofolio
        ]);
    }

    public function delete(Request $request, $id)
    {
        portofolio::destroy($id);
        return response()->json([
            'message' => 'Portofolio berhasil dihapus',
        ]);
    }
}
