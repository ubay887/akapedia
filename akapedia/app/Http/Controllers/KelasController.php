<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Pegawai;
use App\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('created_at', 'DESC')->paginate(10);
        $pegawai = Pegawai::all();

        return view('kelas.index', compact(['kelas', 'pegawai']));
    }

    public function create(Request $request)
    {
        //foreach ($request->siswa_id as $siswa) {
        //    Kelas::create([
        //        'guru_id' => $request->guru_id,
        //        'siswa_id' => $siswa,
        //        'kelas' => $request->kelas,
        //    ]);
       // }

        Kelas::create([
            'guru_id' => $request->guru_id,
            'kelas' => $request->kelas,
        ]);
        return redirect('/data_kelas')->with('succes', 'Succes Menambah Kelas');
    }

    public function siswa($id)
    {
        $kelas = Kelas::find($id);
        $siswa = Siswa::paginate(10);

        return view('kelas.siswa', compact(['kelas', 'siswa']));
    }

    public function murid($id)
    {
        $kelas = Kelas::find($id);
        $siswa = Siswa::paginate(10);

        return view('kelas.murid', compact(['kelas', 'siswa']));
    }

    public function edit($id, Request $request)
    {
        $kelas = Kelas::find($id);
        $pegawai = Pegawai::all();

        return view('kelas.edit', compact(['kelas', 'pegawai']));
    }

    public function update($id, Request $request)
    {
        $kelas = Kelas::find($id);
        $kelas->update($request->all());

        return redirect('/data_kelas')->with('succes', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete($kelas);

        return redirect('/data_kelas');
    }

    public function tambahsiswa($id, Request $request)
    {
        $kelas = Kelas::find($id);

        foreach ($request->siswa_id as $nama) {
            $kelas->siswa()->attach([
                'siswa_id' => $nama,
            ]);
        }

        return redirect('/data_kelas'.$id.'tambah_siswa')->with('succes', 'Tambah Siswa');
    }

    public function deletesiswa($id, $idsiswa)
    {
        $kelas = Kelas::find($id);
        $kelas->siswa()->detach($idsiswa);

        return redirect()->back()->with('succes', 'Data Berhasil Dihapus');
    }

}
