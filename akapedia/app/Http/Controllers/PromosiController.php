<?php

namespace App\Http\Controllers;

use App\Promosi;
use Illuminate\Http\Request;

class PromosiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $promosi = Promosi::where('title', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $promosi = Promosi::paginate(10);
        }

        return view('promosi.index', compact(['promosi']));
    }

    public function create(Request $request)
    {
        $promosi = Promosi::create($request->all());
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('promosi/', $request->file('thumbnail')->getClientOriginalName());
            $promosi->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $promosi->save();
        }

        return redirect('/data_promosi')->with('succes', 'Data Berhasil Di Buat');
    }

    public function edit($id)
    {
        $promosi = Promosi::find($id);

        return view('promosi.edit', compact(['promosi']));
    }

    public function update(Request $request, $id)
    {
        $promosi = Promosi::find($id);
        $promosi->update($request->all());
        if ($request->hasfile('thumbnail')) {
            $request->file('thumbnail')->move('promosi/', $request->file('thumbnail')->getClientOriginalName());
            $promosi->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $promosi->save();
        }

        return redirect('/data_promosi')->with('succes', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $promosi = Promosi::find($id);
        $promosi->delete($promosi);

        return redirect('/data_promosi')->with('succes', 'Data Berhasil Di Hapus');
    }

}
