<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Pegawai;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $mapel = Mapel::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
            $guru = Pegawai::all();
        }else {
            $guru = Pegawai::all();
            $mapel = Mapel::paginate(10);
        }

        return view('mapel.index', compact(['guru', 'mapel']));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'guru_id' => 'required',
        ]);

        Mapel::create($request->all());
        return redirect('/data_mapel')->with('succes', 'Mapel Barhasil Di Input');
    }

    public function edit($id)
    {
        $guru = Pegawai::all();
        $mapel = Mapel::find($id);
        return view('mapel.edit', compact(['mapel', 'guru']));
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $mapel->update($request->all());

        return redirect('data_mapel')->with('succes', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete($id);

        return redirect('/data_mapel')->with('succes', 'Data Berhasil DiHapus');
    }
}
