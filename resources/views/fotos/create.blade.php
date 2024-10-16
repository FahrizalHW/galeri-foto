<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('fotos.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <label>Judul Foto</label>
    <input type="text" name="JudulFoto" required>
    <br>

    <label>Deskirpsi</label>
    <input type="text" name="DeskripsiFoto" required>
    <br>

    <label>Foto</label>
    <input type="file" name="LokasiFile" required>
    <br>

    <label>Release Date</label>
    <input type="date" name="TanggalUnggah" required>
    <br>

    <label>Create By</label>
    <select name="UserId" required>
        <option value="">-- Select User --</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <br>

    <label>Album</label>
    <select name="AlbumId" required>
        <option value="">-- Select Album --</option>
        @foreach($albums as $album)
            <option value="{{ $album->id }}">{{ $album->NamaAlbum }}</option>
        @endforeach
    </select>
    <br>

    <button type="submit">SIMPAN</button>
</form>
