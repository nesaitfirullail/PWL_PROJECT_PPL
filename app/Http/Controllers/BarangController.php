<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Collection;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barang')->get(); // Mengambil semua isi tabel
        $barang = Barang::orderBy('id', 'asc')->paginate(2);
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
    public function show($id)
    {
        $barang = Barang::find($id);
        return view('data.barang.detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = DB::table('barang')->where('id', $id)->first();
        return view('data.barang.edit', compact('barang'));
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
        $barang = Barang::find($id);

        $barang->kode = $request->kode;
        $barang->nama = $request->nama;

        if ($barang->foto && file_exists(storage_path('app/public/' . $barang->foto))) {
            Storage::delete('public/' . $barang->foto);
        }
        $namaFile = time() . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('/images'), $namaFile);
        $barang->foto = $namaFile;

        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        
        $barang->save();

        return redirect()->route('barang.index')
        ->with('success', 'Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();
        return redirect()->route('barang.index')
        -> with('success', 'Barang Berhasil Dihapus');
    }
}
