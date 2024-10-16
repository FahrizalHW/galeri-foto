@extends('layouts.app')

@section('content')

<h1>Fotos list</h1>
<a href="{{route('fotos.create')}}">Create New Foto</a>
<ul>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.4/dist/bootstrap-table.min.css">
        </head>
  
    <table class="table table-hover" border='1'>
        <thead>
            <tr>
                <th>#</th>
                <th>Judul Foto</th>
                <th>Description Foto</th>
                <th>Gambar</th>
                <th>Album</th>
                <th>User</th>        
                <th>Tanggal Upload</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fotos as $foto)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$foto->JudulFoto}}</td>
                <td>{{$foto->DeskripsiFoto}}</td>
                <td>
                    <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="Foto not found" style="max-width: 80px;">
                </td>
                <td>{{$foto->album->NamaAlbum}}</td>
                <td>{{$foto->user->name}}</td>
                <td>{{$foto->TanggalUnggah}}</td>
                <td>
                    <a href="{{route('fotos.edit', $foto->id)}}">EDIT</a>
                    <form action="{{route('fotos.destroy', $foto->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
</ul>

@endsection
