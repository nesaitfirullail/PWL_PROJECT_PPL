@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Supplier</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>Daftar Supplier</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('supplier.create') }}"> Input Supplier</a>
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
        @foreach ($supplier as $spl)
        <tr>        
            <td>{{ $spl ->kode }}</td>
            <td>{{ $spl ->nama }}</td>
            <td>{{ $spl ->alamat }}</td>
            <td>{{ $spl ->telepon }}</td>
            <td>
                <form action="{{ route('supplier.destroy',['supplier'=>$spl->id]) }}" method="POST">
                
                <a class="btn btn-info" href="{{ route('supplier.show',$spl->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('supplier.edit',$spl->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        {{ $supplier->links() }}
    </div>

    
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop