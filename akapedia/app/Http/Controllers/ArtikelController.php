<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $artikel = Artikel::where('tittle', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $artikel = Artikel::paginate(10);
        }

        return view('artikel.index', compact(['artikel']));
    }

    public function create(Request $request)
    {
        $artikel = Artikel::create($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('artikel/', $request->file('thumbnail')->getClientOriginalName());
            $artikel->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $artikel->save();
        }

        return redirect('/data_pengumuman')->with('succes', 'Berhasil Menabahkan Data');
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('artikel.edit', compact(['artikel']));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);
        $artikel->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('artikel/', $request->file('thumbnail')->getClientOriginalName());
            $artikel->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $artikel->save();
        }

        return redirect('/data_pengumuman')->with('succes', 'Data Berhasil DiUpdate');
    }

    public function delete($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete($artikel);

        return redirect('/data_pengumuman')->with('succes', 'Data Berhasil DiHapus');
    }
}
