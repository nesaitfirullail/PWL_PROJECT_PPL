@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Barang</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Daftar Barang</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('barang.create') }}"> Input Barang </a>
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
            <th>Harga</th>
            <th>Stok</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($barang as $brg)
        <tr>        
            <td>{{ $brg ->kode }}</td>
            <td>{{ $brg ->nama }}</td>
            <td>
                <img style="width:90px; height: 90px; "  src="{{ asset('images/' . $brg->foto ) }}" >    
            </td>
            <td>{{ $brg ->harga }}</td>
            <td>{{ $brg ->stok }}</td>
            <td>
                <form action="{{ route('barang.destroy',['barang'=>$brg->id]) }}" method="POST">
                
                <a class="btn btn-info" href="{{ route('barang.show',$brg->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('barang.edit',$brg->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        {{ $barang->links() }}
    </div>

    
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop