<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan UKK</title>
</head>
<body>
    <nav>
        <a href="{{route('albums.index')}}">Albums</a>
        <a href="{{route('users.index')}}">Users</a>
        <a href="{{route('fotos.index')}}">Fotos</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>