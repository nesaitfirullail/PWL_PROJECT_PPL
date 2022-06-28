@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Karyawan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Daftar Karyawan</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('karyawan.create') }}"> Input Karyawan</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
        
    <table class="table table-bordered">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($karyawan as $krw)
        <tr>        
            <td>{{ $krw ->kode }}</td>
            <td>{{ $krw ->nama }}</td>
            <td>
                <img style="width:90px; height: 90px; "  src="{{ asset('images/' . $krw->foto ) }}" >    
            </td>
            <td>{{ $krw ->alamat }}</td>
            <td>{{ $krw ->telepon }}</td>
            <td>
                <form action="{{ route('karyawan.destroy',['karyawan'=>$krw->id]) }}" method="POST">
                
                <a class="btn btn-info" href="{{ route('karyawan.show',$krw->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('karyawan.edit',$krw->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        {{ $karyawan->links() }}
    </div>

    
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop