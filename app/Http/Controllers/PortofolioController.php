<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portofolio;
use Illuminate\Support\Facades\Http;

class PortofolioController extends Controller
{
    //
    public function index()
    {
        $data = Http::withToken(session('token'))->get('http://localhost:3000/api/portofolio');
        $portofolio = json_decode($data->body(), true);

        return view('dashboard.portofolio', ['portofolio' => $portofolio]);
    }

    public function create(Request $request)
    {
        $data = Http::withToken(session('token'))->attach('image', $request->image->path(), $request->image->getClientOriginalName())->post('http://localhost:3000/api/portofolio', [
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $portofolio = json_decode($data->body(), true);

        return back()->with('success', 'Portofolio berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        // $data = Http::withToken(session('token'))->put('http://localhost:3000/api/portofolio/'.$request->id, [
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $request->image,
        // ]);
        $data = Http::withToken(session('token'))->attach('image', $request->image->path(), $request->image->getClientOriginalName())->post('http://localhost:3000/api/portofolio/'.$request->id, [
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $portofolio = json_decode($data->body(), true);

        return back()->with('success', 'Portofolio berhasil diubah');
    }

    public function delete(Request $request, $id)
    {
        $data = Http::withToken(session('token'))->delete('http://localhost:3000/api/portofolio/'.$request->id);
        $portofolio = json_decode($data->body(), true);

        return back()->with('success', 'Portofolio berhasil dihapus');
    }


}
