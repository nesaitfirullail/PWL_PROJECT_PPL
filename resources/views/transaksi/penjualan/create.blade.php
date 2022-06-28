@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header alert alert-success">
                  Tambah Transaksi Penjualan
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('transaksi/penjualan') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> Nama Pelanggan </label>
                                    <select name="kode_pelanggan" class="form-control">
                                        @foreach ($pelanggan as $plg)
                                            <option value="{{ $plg->id }}">{{ $plg->nama }}</option>
                                        @endforeach
                                    </select>                  
                                </div>                                
                            </div>                             
                        </div>
                        <div class="row">                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> Nama Barang </label>
                                    <select name="kode_barang" class="form-control">
                                        @foreach ($barang as $brg)
                                            <option value="{{ $brg->id }}">{{ $brg->nama }}</option>
                                        @endforeach
                                    </select>                  
                                </div>                                
                            </div>                           
                        </div>
                        <div class="row">                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> Tanggal </label>
                                    <input type="date" name="tanggal" class="form-control">
                                </div>
                            </div>                           
                        </div>
                        <div class="row">                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> Jumlah </label>
                                    <input type="text" name="jumlah" class="form-control">              
                                </div>  
                            </div>                            
                        </div>
                        <div class="row">                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> Status </label>
                                    <select name="jenis" class="form-control">
                                        @foreach ($pelanggan as $plg)
                                            <option value="diambil"> Diambil di Toko </option>
                                            <option value="diantar"> Diantar ke Rumah </option>
                                        @endforeach
                                    </select>             
                                </div>  
                            </div>                            
                        </div>
                        <input type="submit" value="simpan" name="simpan" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
@stop