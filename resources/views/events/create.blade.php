<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a new event</h1>

    <form method="POST" action="/events">
        {{ csrf_field() }}
        <div>
            <input type="text" name="event_name" placeholder="Event name">
        </div>
        <div>
            <input type="text" name="event_date" placeholder="Event date">
        </div>
        <div>
            <input type="text" name="event_time" placeholder="Event time">
        </div>
        <div>
            <input type="text" name="event_inschrijven_tm" placeholder="inschrijven t/m">
        </div>
        <div>
            <input type="text" name="event_image_url" placeholder="image naam">
        </div>
        <div>
            <textarea name="event_description" placeholder="Event description"></textarea>
        </div>
        <button type="submit">Create event</button>
    </form>    
    
</body>
</html>