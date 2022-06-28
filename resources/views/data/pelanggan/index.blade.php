@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pelanggan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Daftar Pelanggan</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('pelanggan.create') }}"> Input Pelanggan</a>
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
            <th>Alamat</th>
            <th>Telepon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pelanggan as $plg)
        <tr>        
            <td>{{ $plg ->kode }}</td>
            <td>{{ $plg ->nama }}</td>
            <td>{{ $plg ->alamat }}</td>
            <td>{{ $plg ->telepon }}</td>
            <td>
                <form action="{{ route('pelanggan.destroy',['pelanggan'=>$plg->id]) }}" method="POST">
                
                <a class="btn btn-info" href="{{ route('pelanggan.show',$plg->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('pelanggan.edit',$plg->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        {{ $pelanggan->links() }}
    </div>

    
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop