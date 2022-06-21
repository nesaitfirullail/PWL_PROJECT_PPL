@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Barang
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Kode: </b>{{$barang->kode}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$barang->nama}}</li>
                    <li class="list-group-item"><b>Foto: </b>{{$barang->foto}}</li>
                    <li class="list-group-item"><b>Harga: </b>{{$barang->harga}}</li>
                    <li class="list-group-item"><b>Stok: </b>{{$barang->stok}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('barang.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop