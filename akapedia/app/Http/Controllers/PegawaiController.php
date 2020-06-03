<?php

namespace App\Http\Controllers;

use App\User;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $pegawai = Pegawai::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        }else {
            $pegawai = Pegawai::paginate(10);
        }

        return view('pegawai.index', compact(['pegawai']));
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
            'no_tlp' => 'required',
            'jabatan' => 'required',
            'avatar' => 'required',
        ]);

        $user = new User;
        $user->role = $request->jabatan;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $pegawai = Pegawai::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('pegawai/', $request->file('avatar')->getClientOriginalName());
            $pegawai->avatar = $request->file('avatar')->getClientOriginalName();
            $pegawai->save();
        }

        return redirect('/data_pegawai')->with('succes', 'Berhasil Menabahkan Data');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());
        $user = User::where('id', $pegawai->user_id);
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('pegawai', $request->file('avatar')->getClientOriginalName());
            $pegawai->avatar = $request->file('avatar')->getClientOriginalName();
            $pegawai->save();
        }
        return redirect('/data_pegawai')->with('succes', 'Berhasil Melakukan Update Data');
    }

    public function delete($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete($pegawai);
        $user = User::where('id', $pegawai->user_id);
        $user->delete($user);
        return redirect('/data_pegawai');
    }

    public function profile($id)
    {
        $pegawai = Pegawai::where('user_id', $id);

        return view('pegawai.profile', compact(['pegawai']));
    }

    public function editprofile($id)
    {
        $pegawai = Pegawai::where('user_id', $id);

        return view('pegawai.edit_profile', compact(['pegawai']));
    }

    public function updateprofile($id, Request $request)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());

        $user = User::find(auth()->user()->id);
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/dashboard')->with('succes', 'Update Profile Berhasil');
    }
}
