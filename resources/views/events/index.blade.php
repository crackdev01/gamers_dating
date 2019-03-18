<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Events</h1>

    @foreach ($events as $event)
        <li>
            <a href="/events/{{ $event->id }}">
            {{ $event->event_name }}
            </a>
        </li>
    @endforeach
    <br>
    <a href="/events/create">Create event</a>
</body>
</html>