@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.4/dist/bootstrap-table.min.css">
</head>

<h1>User List</h1>
<a href="{{ route('users.create') }}">Create New User</a>

<table class="table table-hover" border='1' >
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>            
            <th>Tanggal Dibuat</th>            
            <th>Tanggal Diupdate</th>            
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
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
