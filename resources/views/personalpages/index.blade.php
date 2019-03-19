<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>personalpages  userid: {{ Auth::user()->id }}</h1>

    @foreach ($personalpages as $personalpage)
        <li>
            <a href="/personalpages/{{ $personalpage->id }}">
            {{ $personalpage->personal_lastname }} 
            </a>
        </li>
    @endforeach
    <br>
    <a href="/personalpages/create">Create personalpage</a>
</body>
</html>