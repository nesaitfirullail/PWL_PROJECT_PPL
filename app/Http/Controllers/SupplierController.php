<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = DB::table('supplier')->get(); // Mengambil semua isi tabel
        $supplier = Supplier::orderBy('id', 'asc')->paginate(2);
        return view('data.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.supplier.create');
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

        Supplier::create($request->all());
        return redirect()->route('supplier.index')
        ->with('success', 'Supplier Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('data.supplier.detail', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = DB::table('supplier')->where('id', $id)->first();;
        return view('data.supplier.edit', compact('supplier'));
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
        
        Supplier::find($id)->update($request->all());

        return redirect()->route('supplier.index')
        ->with('success', 'Supplier Berhasil Diupdate');

        // return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('supplier.index')
        -> with('success', 'Supplier Berhasil Dihapus');
    }
}
