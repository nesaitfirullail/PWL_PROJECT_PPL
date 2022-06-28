<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = DB::table('karyawan')->get(); // Mengambil semua isi tabel
        $karyawan = Karyawan::orderBy('id', 'asc')->paginate(2);
        return view('data.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namaFile = time() . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('/images'), $namaFile);

        Karyawan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'foto' => $namaFile,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('karyawan.index')
        ->with('success', 'Karyawan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        return view('data.karyawan.detail', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = DB::table('karyawan')->where('id', $id)->first();;
        return view('data.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        $karyawan->kode = $request->kode;
        $karyawan->nama = $request->nama;

        if ($karyawan->foto && file_exists(storage_path('app/public/' . $karyawan->foto))) {
            Storage::delete('public/' . $karyawan->foto);
        }
        $namaFile = time() . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('/images'), $namaFile);
        $karyawan->foto = $namaFile;

        $karyawan->alamat = $request->alamat;
        $karyawan->telepon = $request->telepon;
        
        $karyawan->save();

        return redirect()->route('karyawan.index')
        ->with('success', 'Karyawan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::find($id)->delete();
        return redirect()->route('karyawan.index')
        -> with('success', 'Karyawan Berhasil Dihapus');
    }
}
