<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album</title>
</head>
<body>
    <form action="{{ route('albums.update', $album->id) }}" method="post">


        @csrf
        @method('PUT') <!-- Untuk menandakan request ini adalah PUT (edit) -->

        <label>Nama Album</label>
        <input type="text" name="NamaAlbum" value="{{ old('NamaAlbum', $album->NamaAlbum) }}" required>
        <br>
        
        <label>Deskripsi</label>
        <input type="text" name="DeskripsiFoto" value="{{ old('DeskripsiFoto', $album->DeskripsiFoto) }}" required>
        <br>

        <label>Release date</label>
        <input type="date" name="TanggalDibuat" value="{{ old('TanggalDibuat', $album->TanggalDibuat) }}" required>
        <br>

        <label>Create By</label>
        <select name="UserId" required>
            <option value="">-- Select User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $album->UserId == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br>

        <button type="submit">UPDATE</button>
    </form>
</body>
</html>
