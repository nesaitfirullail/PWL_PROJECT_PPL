@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <a href="{{ URL::to('transaksi/penjualan/create') }}">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('cetak_pdf') }}"> Cetak PDF </a>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th> Nama Pelanggan </th>
                        <th> Nama Barang </th>
                        <th> Tanggal </th>
                        <th> Jumlah </th>
                        <th> Total </th>
                        {{-- <th> Aksi </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $pj)
                        <tr>
                            <td> {{ $pj->nama_pelanggan}} </td>
                            <td> {{ $pj->nama_barang}} </td>
                            <td> {{ $pj->tanggal}} </td>
                            <td> {{ $pj->jumlah}} </td>
                            <td> {{ $pj->status == "diambil" ? "Diambil di Toko" : "Diantar ke Rumah"}} </td>
                            {{-- <td>
                                <a href="{{ URL::to('transaksi/penjualan/' . $pj->id . '/edit') }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a href="{{ URL::to('transaksi/penjualan/' . $pj->id . '/delete') }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop