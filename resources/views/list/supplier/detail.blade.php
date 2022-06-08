@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Supplier
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Kode: </b>{{$supplier->kode}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$supplier->nama}}</li>
                    <li class="list-group-item"><b>Alamat: </b>{{$supplier->alamat}}</li>
                    <li class="list-group-item"><b>Telepon: </b>{{$supplier->telepon}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('supplier.index') }}">Kembali</a>
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