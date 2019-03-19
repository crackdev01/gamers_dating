<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a new personalpage</h1>

    <form method="POST" action="/personalpages">
        {{ csrf_field() }}
        <div>
            <input type="text" name="personal_firstname" placeholder="First name">
        </div>
        <div>
            <input type="text" name="personal_lastname" placeholder="Last name">
        </div>
        <div>
            <input type="text" name="personal_nickname" placeholder="Nick name">
        </div>
        <div>
            <input type="text" name="personal_gender" placeholder="gender">
        </div>
        <div>
            <input type="text" name="personal_age" placeholder="your age">
        </div>
        <div>
            <input type="text" name="personal_location" placeholder="Location">
        </div>
        <div>
            <input type="text" name="personal_image_url" placeholder="Your photo name">
        </div>
        <div>
            <input type="text" name="personal_food" placeholder="your favorite food">
        </div>
       
        <div>
            <textarea name="personal_info" placeholder="who are you?"></textarea>
        </div>
        <button type="submit">Create personalpage</button>
    </form>    
    <a href="/personalpages/">Home</a>  
    
</body>
</html>