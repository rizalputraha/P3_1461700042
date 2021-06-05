@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Alumni</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Tambah Buku</h3>
            </div>
        </div>
        <br>

        @if ($errors->all())
            <div class="alert alert-danger">
                <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('buku.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <select name="judul" id="judul">
                        @foreach($bukus as $buku)
                            <option value='{{$buku->id}}'>{{$buku->judul}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nimMahasiswa" class="col-sm-2 col-form-label">Jenis Buku</label>
                <div class="col-sm-10">
                <select name="judul" id="judul">
                        @foreach($jenises as $jenis)
                            <option value='{{$jenis->id}}'>{{$jenis->jenis}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <a href="{{route('buku.index')}}" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

    </div>
    </body>
</html>
    
@endsection