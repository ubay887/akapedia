<?php

namespace App\Http\Controllers;

use App\About;
use App\Exports\SiswaExport;
use App\Mapel;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = Siswa::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $data_siswa = Siswa::paginate(10);
        }

        return view('siswa.index', compact(['data_siswa']));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric|min:12',
            'avatar' => 'mimes:jpg,png',
        ]);

        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id ]);
        $data_siswa = Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('siswa/', $request->file('avatar')->getClientOriginalName());
            $data_siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $data_siswa->save();
        }

        return redirect('/data_siswa')->with('succes', 'Berhasil Menabahkan Data');

    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);

        return view('siswa.edit', compact(['siswa']));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        $user = User::where('id', $siswa->user_id);
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('siswa/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/data_siswa')->with('succes', 'Berhasil Merubah Data');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);
        $user = User::where('id', $siswa->user_id);
        $user->delete($user);

        return redirect('/data_siswa')->with('succes', 'Berhasil Mehapus Data');
    }

    public function profile($id)
    {
        $siswa = Siswa::find($id);
        $matapelajaran = Mapel::orderBy('created_at', 'DESC')->paginate(10);

        return view('siswa.profile', [
            'siswa' => $siswa,
            'matapelajaran' => $matapelajaran,
            ]);
    }

    public function nilai(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->mapel()->attach($request->mapel_id, [
            'semester' => $request->semester,
            'nilai' => $request->nilai
            ]);
        return redirect('data_siswa/' . $id . '/profile')->with('succes', 'Nilai Berhasil Ditambah');
    }

    public function deletenilai($id, $idmapel)
    {
        $siswa = Siswa::find($id);
        $siswa->mapel()->detach($idmapel);

        return redirect()->back()->with('succes', 'Nilai Berhasil Dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'data_siswa.xlsx');
    }

    public function exportPDF()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf', compact(['siswa']));
        return $pdf->download('data_siswa.pdf');
    }

    public function editsiswa($id)
    {
        $siswa = Siswa::where('user_id', $id);

        return view('site.siswa_edit', compact(['siswa']));
    }

    public function updatesiswa($id, Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('siswa/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/index/dashboard')->with('succes', 'Berhasil Update Profile');
    }

    public function print($id)
    {
        $siswa = Siswa::find($id);
        $mapel = Mapel::orderBy('created_at', 'DESC')->paginate(10);
        $print = PDF::loadview('export.nilaipdf', compact(['siswa', 'mapel']));

        return $print->download('nilaipdf.pdf');
    }

    public function nilaisiswa($id)
    {
        $siswa = Siswa::find($id);
        $mapel = Mapel::orderBy('created_at', 'DESC')->paginate(10);
        $about = About::orderBy('created_at', 'DESC')->paginate(1);

        return view('site.nilai_siswa', compact(['siswa', 'mapel', 'about']));
    }

    public function printsiswa($id)
    {
        $siswa = Siswa::find($id);
        $mapel = Mapel::orderBy('created_at', 'DESC')->paginate(10);
        $print = PDF::loadview('export.nilaipdf', compact(['siswa', 'mapel']));

        return $print->download('nilaipdf.pdf');
    }

}
