<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Karyawan;
use App\Models\Pembelian;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = DB::table('pembelian AS pb')
                    ->join('karyawan AS krw' , 'pb.kode_karyawan' , '=', 'krw.id')
                    ->join('supplier AS sup' , 'pb.kode_supplier' , '=', 'sup.id')
                    ->select('pb.id' , 'krw.nama as nama_karyawan', 'sup.nama as nama_supplier', 'pb.tanggal', 'pb.jumlah', 'pb.status')
                    ->get();
                    
        return view('transaksi.pembelian.index', compact('pembelian'));
        // return response()->json($pembelian);

       
    }

    public function cetak_pdf(){
        $pembelian = DB::table('pembelian AS pb')
                    ->join('karyawan AS krw' , 'pb.kode_karyawan' , '=', 'krw.id')
                    ->join('supplier AS sup' , 'pb.kode_supplier' , '=', 'sup.id')
                    ->select('pb.id' , 'krw.nama as nama_karyawan', 'sup.nama as nama_supplier', 'pb.tanggal', 'pb.jumlah', 'pb.status')
                    ->get();
                
        $pdf = PDF::loadView('transaksi.pembelian.cetak_pdf', ["Pembelian" => $pembelian]);
        return $pdf->download(rand(10 , 100) . "Data_Pembelian.pdf");
        
        // $supplier = supplier::all();
        // $pdf = PDF::loadview('data.supplier.cetak_pdf',['supplier'=>$supplier]);
        // return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        $supplier = Supplier::all();

        return view('transaksi.pembelian.create', compact('karyawan', 'supplier'));
        // return response()->json($karyawan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pembelian = pembelian::create($request->all());
        // $pembelian = pembelian::create([
        //     "kode_karyawan" => $request->kode_karyawan,
        //     "kode_supplier" => $request->kode_supplier,
        //     "tanggal" => $request->tanggal,
        //     "jumlah" => $request->jumlah,
        //     "status" => $request->status
        // ]);
        $pembelian = Pembelian::create( $request->all());
        
        // return response()->json($request->all());
        return redirect('transaksi/pembelian')->with('success' , 'Data berhasil ditambahkan');
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

