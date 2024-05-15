<?php

namespace App\Http\Controllers;

use App\Models\studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studios = Studio::all();
        return view('admin.studio',compact('studios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'foto' =>  'required|image',
            'lokasi' => 'required|string'
        ]);

        if($validator->fails()) {
            Session::flash('error', 'Input gagal! Perika input anda.');
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Simpan Data
        $studio = new Studio();
        $studio->nama = $request->nama;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img'), $nama_foto);
            $studio->foto = $nama_foto;
        }
        $studio->lokasi = $request->lokasi;
        $studio->save();

        $studio = Studio::all();
        return redirect()->route('studio.index')->with('studio', $studio);
    }

    /**
     * Display the specified resource.
     */
    public function show(studio $studio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $studio = Studio::find($id);

        return view('studioedit', compact('studio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'foto' =>  'nullable',
            'lokasi' => 'required|string'
        ]);

        if($validator->fails()) {
            Session::flash('error', 'Input gagal! Perika input anda.');
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $studio = Studio::findOrFail($id);
        $studio->nama = $request->nama;
        $studio->lokasi = $request->lokasi;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img'), $nama_foto);
            $studio->foto = $nama_foto;
        }
        $studio->save();
        return redirect()->route('studio.index')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $studio = Studio::find($id);

        if($studio){
            $studio->delete();
        }
        return redirect()->route('studio.index')->with('succes','film berhasil dihapus');

    }
}
