@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container mt-5"> 
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Karyawan
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
                    <form method="post" action="{{ route('karyawan.update', $karyawan->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode">Kode</label> 
                            <input type="text" name="kode" class="form-control" id="kode" value="{{ $karyawan->kode }}" aria-describedby="kode" > 
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label> 
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $karyawan->nama }}" aria-describedby="nama" > 
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label> 
                            <input type="file" name="foto" class="form-control" id="foto" value="{{ $karyawan->foto }}" aria-describedby="foto" > 
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label> 
                            <input type="alamat" name="alamat" class="form-control" id="alamat" value="{{ $karyawan->alamat }}" aria-describedby="alamat" > 
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label> 
                            <input type="telepon" name="telepon" class="form-control" id="telepon" value="{{ $karyawan->telepon }}" aria-describedby="telepon" > 
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