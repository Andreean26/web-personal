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
        $portofolio = portofolio::all();
        return response()->json([
            'portofolio' => $portofolio,

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
