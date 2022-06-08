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
                    <form action="{{ URL::to('admin/profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" >                                  
                                </div>                                
                            </div>
                            <div class="col-md-3">                                
                                <div class="mb-3">
                                    <label class="form-label">Email Aktif</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" >                                   
                                </div>
                            </div>
                            <div class="col-md-3">                                
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat" id="alamat" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label>Photo Profile</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label>Biodata Singkat</label>
                                <textarea name="biodata" id="biodata"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script>
        $(function () {
            CKEDITOR.replace( 'alamat' );
            CKEDITOR.replace( 'biodata' );
        });
    </script>
@stop