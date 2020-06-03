<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function login()
    {
        return view('dashboard.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard')->with('succes', 'Login Berhasil');
        }

        return redirect('/login')->with('error', 'Login Gagal');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function about()
    {
        $abouts = About::paginate(10);
        return view('dashboard.about', compact(['abouts']));
    }

    public function create(Request $request)
    {
        About::create($request->all());

        return redirect()->back()->with('succes', 'Input Data About Succes');
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('dashboard.about_edit', compact(['about']));
    }

    public function update($id, Request $request)
    {
        $about = About::find($id);
        $about->update($request->all());

        return redirect('/data_about')->with('succes', 'Update Data Berhasil');
    }

    public function delete($id)
    {
        $about = About::find($id);
        $about->delete($id);

        return redirect()->back()->with('succes', 'Delete Berhasil');
    }
}
