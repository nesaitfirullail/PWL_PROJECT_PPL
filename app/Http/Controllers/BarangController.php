<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = $barang = DB::table('barang')->get(); // Mengambil semua isi tabel
        $post = Barang::orderBy('kode', 'asc')->paginate(2);
        return view('data.barang.index', compact('barang'));
        // return view('data.barang.index', ['barang' => $barang,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($request->file('image')) {
        //     $image_name = $request->file('image')->store('images', 'public');
        // }

        $namaFile = time() . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('/images'), $namaFile);

        Barang::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'foto' => $namaFile,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);


        return redirect()->route('barang.index')
        ->with('success', 'Barang Berhasil Ditambahkan');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode)
    {
        $barang = Barang::find($kode);
        return view('data.barang.detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode)
    {
        $barang = DB::table('barang')->where('kode', $kode)->first();
        return view('data.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'foto' => 'required',
            'harga' => 'required',
            'stok' => 'required', 
        ]);
        
        Barang::find($kode)->update($request->all());

        return redirect()->route('barang.index')
        ->with('success', 'Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode)
    {
        Barang::find($kode)->delete();
        return redirect()->route('barang.index')
        -> with('success', 'Barang Berhasil Dihapus');
    }
}
