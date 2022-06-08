@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container mt-5"> 
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Barang
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('barang.update', $barang->kode) }}" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode">Kode</label> 
                            <input type="text" name="kode" class="form-control" id="kode" value="{{ $barang->kode }}" aria-describedby="kode" > 
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label> 
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $barang->nama }}" aria-describedby="nama" > 
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label> 
                            <input type="harga" name="harga" class="form-control" id="harga" value="{{ $barang->harga }}" aria-describedby="harga" > 
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label> 
                            <input type="stok" name="stok" class="form-control" id="stok" value="{{ $barang->stok }}" aria-describedby="stok" > 
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
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