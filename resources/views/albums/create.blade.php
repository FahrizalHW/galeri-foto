<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('albums.store')}}" method="post">

        @csrf
       

        <label>Nama Album</label>
        <input type="text" name="NamaAlbum" required>
        <br>
        
        <label>Deskirpsi</label>
        <input type="text" name="DeskripsiFoto" required>
        <br>

        <label>Release date</label>
        <input type="date" name="TanggalDibuat" required>
        <br>

        <label>Create By</label>
        <select name="UserId" required>
            <option value="">-- Select User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
<br>
        

        <button type="submit">SIMPAN</button>
    </form>
</body>
</html>