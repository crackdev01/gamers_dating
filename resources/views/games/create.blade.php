@if (Auth::user() && Auth::user()->role == 'admin')

@extends('master')

<!--Title on tab current page -->
@section('title', 'admin')

@section('content')
    <!--Name / logo landingpage -->
    @section('logo/menu')
    @include ('codeincludes/newmenu')

<head>
    <link rel="stylesheet" href="{{ asset('/css/adminevents.css') }}">
</head>
<body>

<div class="container_events">
    <div class="container_events_title">
        <h1>Admin Create Game</h1>
    </div>
    <form method="POST" action="/games">
        {{ csrf_field() }}
        <div class="event_label">
            <label class="event_label">Game name</label>
            <input type="text" name="game_name" placeholder="Game name" autofocus required maxlength=60>
        </div>
        <div class="event_label">
            <label class="event_label">Game genre</label>
            <input type="text" name="game_genre" placeholder="Game genre" required maxlength=40>
        </div>
        <div class="event_label">
            <label class="event_label">Game image name</label>
            <input type="text" name="game_image_url" placeholder="Image name" required maxlength=50>
        </div>
       
        <div class="event_label">
            <label class="event_label">Game description</label>
            <textarea name="game_description" placeholder="Game description"  required maxlength=400></textarea>
        </div>
        <button class="button_events_create" type="submit">Create game</button>
      </form> 
      <div class="event_pos_back_but">
        <a href="\events"><button class="button_events_back">Back</button></a>    
      </div>
 </div>
@endsection

@else 'Acces not allowed, only for admin!'
@endif
    


