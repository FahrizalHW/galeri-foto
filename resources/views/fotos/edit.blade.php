@extends('layouts.app')

@section('content')

<h1>Edit Foto</h1>

<form action="{{ route('fotos.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="JudulFoto" class="form-label">Judul Foto</label>
        <input type="text" name="JudulFoto" class="form-control" value="{{ old('JudulFoto', $foto->JudulFoto) }}" required>
    </div>

    <div class="mb-3">
        <label for="DeskripsiFoto" class="form-label">Deskripsi Foto</label>
        <input type="text" name="DeskripsiFoto" class="form-control" value="{{ old('DeskripsiFoto', $foto->DeskripsiFoto) }}" required>
    </div>

    <div class="mb-3">
        <label for="LokasiFile" class="form-label">Gambar</label>
        <input type="file" name="LokasiFile" class="form-control">
        @if ($foto->LokasiFile)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="Foto" style="max-width: 150px;">
                <p>Gambar saat ini</p>
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="AlbumId" class="form-label">Pilih Album</label>
        <select name="AlbumId" class="form-select" required>
            <option value="">-- Pilih Album --</option>
            @foreach($albums as $album)
                <option value="{{ $album->id }}" {{ $foto->AlbumId == $album->id ? 'selected' : '' }}>
                    {{ $album->NamaAlbum }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="UserId" class="form-label">Pilih User</label>
        <select name="UserId" class="form-select" required>
            <option value="">-- Pilih User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $foto->UserId == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Foto</button>
</form>

@endsection
