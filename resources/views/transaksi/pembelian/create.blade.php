@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header alert alert-success">
                  Tambah Transaksi Pembelian
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('transaksi/pembelian') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> Nama Karyawan </label>
                                    <select name="kode_karyawan" class="form-control">
                                        @foreach ($karyawan as $krw)
                                            <option value="{{ $krw->id }}">{{ $krw->nama }}</option>
                                        @endforeach
                                    </select>                  
                                </div>                                
                            </div>                             
                        </div>
                        <div class="row">                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label"> Nama Supplier </label>
                                    <select name="kode_supplier" class="form-control">
                                        @foreach ($supplier as $sup)
                                            <option value="{{ $sup->id }}">{{ $sup->nama }}</option>
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
                                        @foreach ($karyawan as $krw)
                                            <option value="diambil"> Diambil ke Agen </option>
                                            <option value="diantar"> Diantar ke Toko </option>
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