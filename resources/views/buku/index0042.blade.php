@extends('layouts.app')
@section('content')
 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Buku</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3> Daftar Buku</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('buku.create')}}"> Tambah Buku </a>
            </div>
        </div> 
        <br>

    <table class="table table-striped">
      <thead>
        <tr>
            <th width="40px"><b>No.</b></th>
            <th width="180px">Judul</th>
            <th width="100px">Tahun Terbit</th>
        </tr>
      </thead>
        @foreach ($bukus as $i => $buku) 
            <tr>
                <td><b>{{++$i}}.<b></td>
                <td>{{$buku->judul}}</td>
                <td>{{$buku->tahun_terbit}}</td>
                <td>
                    <form action="{{ route('buku.destroy',$buku->id) }}" method="post">
                    <a class="btn btn-sm btn-warning" href="{{ route('buku.edit', $buku->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>    
                </td>
            </tr>
        @endforeach
    </table>

    </div>
    </body>

</html>

@endsection