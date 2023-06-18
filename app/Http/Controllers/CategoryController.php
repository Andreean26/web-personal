<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CategoryController extends Controller
{
    //
    public function index()
    {
        $data = Http::withToken(session('token'))->get('http://localhost:3000/api/category');
        $category = json_decode($data->body(), true);


        return view('dashboard.category', compact('data','category'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $data = Http::withToken(session('token'))->post('http://localhost:3000/api/category', [
            'name' => $request->name,
        ]);

        $category = json_decode($data->body(), true);

        return back()->with('success', 'Category berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $data = Http::withToken(session('token'))->post('http://localhost:3000/api/category/'.$request->id, [
            'name' => $request->name,
        ]);
        $category = json_decode($data->body(), true);

        return back()->with('success', 'Category berhasil diubah');
    }

    public function delete(Request $request, $id)
    {
        $data = Http::withToken(session('token'))->delete('http://localhost:3000/api/category/'.$request->id);
        $category = json_decode($data->body(), true);

        return back()->with('success', 'Category berhasil dihapus');
    }
}
