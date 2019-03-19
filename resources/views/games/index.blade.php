<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Games</h1>

    @foreach ($games as $game)
        <li>
            <a href="/games/{{ $game->id }}">
            {{ $game->game_name }}
            </a>
        </li>
    @endforeach
    <br>
    <a href="/games/create">Create game</a>
</body>
</html>