@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container mt-5"> 
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Pelanggan
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
                    <form method="post" action="{{ route('pelanggan.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                        <label for="kode">Kode</label> 
                        <input type="text" name="kode" class="form-control" id="kode" aria-describedby="kode" > 
                        </div>
                        <div class="form-group">
                        <label for="nama">Nama</label> 
                        <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="nama" > 
                        </div>
                        <div class="form-group">
                        <label for="alamat">Alamat</label> 
                        <input type="alamat" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" > 
                        </div>
                        <div class="form-group">
                        <label for="telepon">Telepon</label> 
                        <input type="telepon" name="telepon" class="form-control" id="telepon" aria-describedby="telepon" > 
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