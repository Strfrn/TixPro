<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\film;
use Illuminate\Support\Facades\Session;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $films = Film::all();
        return view('admin.film', compact('films'));
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
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string',
        'sinopsis' => 'required|string',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'rating' => 'required|numeric',
        'durasi' => 'required|integer',
        'genre' => 'required|string',
        'tahun_rilis' => 'required|integer',
    ]);

    if ($validator->fails()) {
        Session::flash('error', 'Input gagal! Periksa input anda.');
        return redirect()->back()->withInput()->withErrors($validator);
    }

    // Simpan Data
    $film = new Film();
    $film->judul = $request->judul;
    $film->sinopsis = $request->sinopsis;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $hash = md5_file($foto->getPathname());

        // Periksa apakah ada file yang sudah ada dengan hash yang sama
        $existingFile = Film::where('foto_hash', $hash)->first();
        if ($existingFile) {
            $film->foto = $existingFile->foto;
        } else {
            $nama_foto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img/poster/'), $nama_foto);
            $film->foto = $nama_foto;
            $film->foto_hash = $hash;
        }
    }

    $film->rating = $request->rating;
    $film->durasi = $request->durasi;
    $film->genre = $request->genre;
    $film->tahun_rilis = $request->tahun_rilis;
    $film->save();

    return redirect()->route('film.index')->with('success', 'Film berhasil disimpan');
}



    /**
     * Display the specified resource.
     */
    public function show(film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $film = Film::find($id);

        return view('admin.filmedit', compact('film'));;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'sinopsis' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rating' => 'required|numeric',
            'durasi' => 'required|integer',
            'genre' => 'required|string',
            'tahun_rilis' => 'required|integer',
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Input gagal! Perika input anda.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $film = Film::findOrFail($id);
        $film->judul = $request->judul;
        $film->sinopsis = $request->sinopsis;

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            $oldFoto = public_path('img/poster/' . $film->foto);
            if (file_exists($oldFoto)) {
                @unlink($oldFoto);
            }

            // Unggah foto baru
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img/poster/'), $nama_foto);
            $film->foto = $nama_foto;
        }

        $film->rating = $request->rating;
        $film->durasi = $request->durasi;
        $film->genre = $request->genre;
        $film->tahun_rilis = $request->tahun_rilis;
        $film->save();

        return redirect()->route('film.index')->with('success', 'Film berhasil diperbarui');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $data = Film::find($id);

        if($data){
            $data->delete();
        }
        return redirect()->route('film.index')->with('succes','film berhasil dihapus');

    }

}
