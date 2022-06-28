<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = DB::table('pelanggan')->get(); // Mengambil semua isi tabel
        $pelanggan = Pelanggan::orderBy('id', 'asc')->paginate(2);
        return view('data.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required', 
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')
        ->with('success', 'Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('data.pelanggan.detail', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = DB::table('pelanggan')->where('id', $id)->first();;
        return view('data.pelanggan.edit', compact('pelanggan'));
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
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required', 
        ]);

        Pelanggan::find($id)->update($request->all());
        // return response()->json($request->all());

        return redirect()->route('pelanggan.index')
        ->with('success', 'Pelanggan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::find($id)->delete();
        return redirect()->route('pelanggan.index')
        -> with('success', 'Pelanggan Berhasil Dihapus');
    }
}
