@extends('layouts.app')

@section('content')
<h1>Album List</h1>
<a href="{{ route('albums.create') }}">Create New Album</a>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.4/dist/bootstrap-table.min.css">
    </head> 

<table class="table table-hover" border='1'>
    <thead>
        <tr>
            <th>#</th>
            <th>Album Name</th>
            <th>Description</th>
            <th>Creation</th>
            <th>User</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($albums as $album)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $album->NamaAlbum }}</td>
            <td>{{ $album->DeskripsiFoto }}</td>
            <td>{{ $album->TanggalDibuat }}</td>
            <td>{{ $album->user->name }}</td>
            <td>
                <a href="{{ route('albums.edit', $album->id) }}">Edit</a>
                <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
