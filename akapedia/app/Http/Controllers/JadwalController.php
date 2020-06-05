<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Kelas_mapel;
use App\Mapel;
use Illuminate\Http\Request;
use PDF;

class JadwalController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('created_at', 'DESC')->paginate(10);


        return view('kelas.jadwal', compact(['kelas']));
    }

    public function inputjadwal($id)
    {
        $kelas = Kelas::find($id);
        $mapel = Mapel::all();

        return view('kelas.input_jadwal', compact(['kelas', 'mapel']));
    }

    public function create($id ,Request $request)
    {
        $kelas = Kelas::find($id);
        $kelas->mapel()->attach($request->mapel_id, [
            'hari' => $request->hari,
            ]);

        return redirect('/data_jadwal')->with('succes', 'Input Jadwal Berhasil');
    }

    public function jadwal($id)
    {
        $kelas = Kelas::find($id);
        $mapel = Mapel::paginate(10);

        return view('kelas.jadwal_kelas', compact(['kelas', 'mapel']));
    }

    public function delete($id, $idmapel)
    {
        $kelas = Kelas::find($id);
        $kelas->mapel()->detach($idmapel);

        return redirect()->back()->with('succes', 'Data Berhasil Dihapus');
    }

    public function print($id)
    {
        $kelas = Kelas::find($id);
        $mapel = Mapel::all();
        $pdf = PDF::loadview('export.jadwalpdf', compact(['kelas', 'mapel']));

        return $pdf->download('data_jadwal.pdf');

    }

}
