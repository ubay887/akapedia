<?php

namespace App\Http\Controllers;

use App\About;
use App\Artikel;
use App\Berita;
use App\Kelas;
use App\Mapel;
use App\Promosi;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy('created_at', 'DESC')->paginate(6);
        $berita = Berita::orderBy('created_at', 'DESC')->paginate(3);
        $promosi = Promosi::orderBy('created_at', 'DESC')->paginate(3);
        $about = About::orderBy('created_at', 'DESC')->paginate(1);
        return view('site.index', compact(['artikel', 'berita', 'promosi', 'about']));
    }

    public function artikel($slug)
    {
        $artikel = Artikel::where('slug', '=', $slug)->first();
        $about = About::orderBy('created_at', 'DESC')->paginate(1);
        return view('site.singlepost', compact(['artikel', 'about']));
    }

    public function berita($slug)
    {
        $berita = Berita::where('slug', '=', $slug)->first();
        $about = About::orderBy('created_at', 'DESC')->paginate(1);
        return view('site.berita', compact(['berita', 'about']));
    }

    public function promosi($slug)
    {
        $promosi = Promosi::where('slug', '=', $slug)->first();
        $about = About::orderBy('created_at', 'DESC')->paginate(1);
        return view('site.promosi', compact(['promosi', 'about']));
    }

    public function pengumuman(Request $request)
    {
        if ($request->has('cari')) {
            $artikel = Artikel::where('tittle', 'LIKE', '%' . $request->cari .'%')->paginate(10);
            $about = About::orderBy('created_at', 'DESC')->paginate(1);
        } else {
            $artikel = Artikel::orderBy('created_at', 'DESC')->paginate(10);
            $about = About::orderBy('created_at', 'DESC')->paginate(1);
        }

        return view('site.pengumunan', compact(['artikel', 'about']));
    }

    public function beritas(Request $request)
    {
        if ($request->has('cari')) {
            $berita = Berita::where('title', 'LIKE', '%' . $request->cari .'%')->paginate(10);
            $about = About::orderBy('created_at', 'DESC')->paginate(1);
        } else {
            $berita = Berita::orderBy('created_at', 'DESC')->paginate(10);
            $about = About::orderBy('created_at', 'DESC')->paginate(1);
        }

        return view('site.berita_all', compact(['berita', 'about']));
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->role == "siswa") {

                return redirect('/index/dashboard')->with('succes', 'Login Succes');
            }
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('succes', 'Logout Berhasil');

    }

    public function dashboard()
    {
        $kelas = kelas::all();
        $siswa = Siswa::where('id', auth()->user()->siswa->id);

        $about = About::orderBy('created_at', 'DESC')->paginate(1);
        return view('site.dashboard', compact(['about', 'kelas', 'siswa']));
    }

    public function about()
    {
        $about = About::orderBy('created_at', 'DESC')->paginate(1);

        return view('site.about', compact(['about']));
    }

    public function akademik()
    {
        $kelas = Kelas::all();
        $about = About::orderBy('created_at', 'DESC')->paginate(1);

        return view('site.akademik', compact(['kelas', 'about']));
    }

    public function kelas($id)
    {
        $kelas = Kelas::find($id);
        $mapel = Mapel::orderBy('created_at', 'DESC')->paginate(10);
        $about = About::orderBy('created_at', 'DESC')->paginate(1);

        return view('site.jadwal', compact(['kelas', 'mapel', 'about']));
    }

}
