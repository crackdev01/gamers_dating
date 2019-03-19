<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a new game</h1>

    <form method="POST" action="/games">
        {{ csrf_field() }}
        <div>
            <input type="text" name="game_name" placeholder="Game name">
        </div>
        <div>
            <input type="text" name="game_genre" placeholder="Game genre">
        </div>
        <div>
            <input type="text" name="game_image_url" placeholder="Image name">
        </div>
       
        <div>
            <textarea name="game_description" placeholder="Game description"></textarea>
        </div>
        <button type="submit">Create game</button>
    </form>    
    <a href="/games/">Home</a>  
    
</body>
</html>