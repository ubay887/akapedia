<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $berita = Berita::where('title', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $berita = Berita::paginate(10);
        }

        return view('berita.index', compact(['berita']));

    }

    public function create(Request $request)
    {
        $berita = Berita::create($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('berita/', $request->file('thumbnail')->getClientOriginalName());
            $berita->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $berita->save();
        }

        return redirect('/data_berita')->with('succes', 'Berhasil Menabahkan Data');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('berita.edit', compact(['berita']));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        $berita->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('berita/', $request->file('thumbnail')->getClientOriginalName());
            $berita->thumbail = $request->file('thumbnail')->getClientOriginalName();
            $berita->save();
        }

        return redirect('/data_berita')->with('succes', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $berita = Berita::find($id);
        $berita->delete($berita);

        return redirect('/data_berita')->with('succes', 'Data Berhasil Dihapus');
    }
}
