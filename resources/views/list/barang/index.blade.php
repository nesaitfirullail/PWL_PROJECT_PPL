@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header alert-success">
                  Profile User 
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Nama Lengkap </th>
                                <th> Email </th>
                                <th> Alamat </th>
                                <th> Photo </th>
                                <th> Biodata </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile as $pro)
                                <tr>
                                    <td> {{ $pro->id }} </td>
                                    <td> {{ $pro->name }} </td>
                                    <td> {{ $pro->email }} </td>
                                    <td> {{ strip_tags($pro->alamat)  }} </td>
                                    <td> 
                                        <img style="width:90px; height: 90px; "  src="{{ asset('images/' . $pro->photo ) }}" >
                                    </td>
                                    <td> {{ strip_tags($pro->biodata) }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $profile->links() }}
                </div>
              </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop