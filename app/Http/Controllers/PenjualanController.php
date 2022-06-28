<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = DB::table('penjualan AS pj')
                    ->join('pelanggan AS plg' , 'pj.kode_pelanggan' , '=', 'plg.id')
                    ->join('barang AS brg' , 'pj.kode_barang' , '=', 'brg.id')
                    ->select('pj.id' , 'plg.nama as nama_pelanggan', 'brg.nama as nama_barang', 'pj.tanggal', 'pj.jumlah', 'pj.status')
                    ->get();
                    
        return view('transaksi.penjualan.index', compact('penjualan'));
        // return response()->json($penjualan);

       
    }

    public function cetak_pdf(){
        $penjualan = DB::table('penjualan AS pj')
                    ->join('pelanggan AS plg' , 'pj.kode_pelanggan' , '=', 'plg.id')
                    ->join('barang AS brg' , 'pj.kode_barang' , '=', 'brg.id')
                    ->select('pj.id' , 'plg.nama as nama_pelanggan', 'brg.nama as nama_barang', 'pj.tanggal', 'pj.jumlah', 'pj.status')
                    ->get();
                
        $pdf = PDF::loadView('transaksi.penjualan.cetak_pdf', ["penjualan" => $penjualan]);
        return $pdf->download(rand(10 , 100) . "Data_Penjualan.pdf");
        
        // $barang = Barang::all();
        // $pdf = PDF::loadview('data.barang.cetak_pdf',['barang'=>$barang]);
        // return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();

        return view('transaksi.penjualan.create', compact('pelanggan', 'barang'));
        // return response()->json($pelanggan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $penjualan = Penjualan::create($request->all());
        // $penjualan = Penjualan::create([
        //     "kode_pelanggan" => $request->kode_pelanggan,
        //     "kode_barang" => $request->kode_barang,
        //     "tanggal" => $request->tanggal,
        //     "jumlah" => $request->jumlah,
        //     "status" => $request->status
        // ]);
        $penjualan = Penjualan::create( $request->all());
        
        // return response()->json($request->all());
        return redirect('transaksi/penjualan')->with('success' , 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
