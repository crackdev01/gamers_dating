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
        <h1>Admin Edit Game</h1>
    </div>


<form method="POST" action="/games/{{ $game->id }}">
       {{ method_field('PATCH') }}
       {{-- to protect against cross site... --}}
       {{ csrf_field() }}  

     
        <div>
            <label class="event_label" for="game_name">Game name</label>
            <div class="event_field">
                <input type="text" name="game_name" placeholder="Game name" value="{{ $game->game_name }}" autofocus required maxlength=60>
            </div>
        </div>
        <div>
            <label class="event_label" for="game_genre">Game genre</label>
            <div class="event_field">
                <input type="text" name="game_genre" placeholder="Game genre" value="{{ $game->game_genre }}" required maxlength=40>
            </div>
        </div>
        <div class="event_field">
            <label class="event_label" for="game_image_url">Game image name</label>
            <div>
                <input type="text" name="game_image_url" placeholder="Image name" value="{{ $game->game_image_url }}" required maxlength=50>
            </div>
        </div>
        <div class="event_field">
            <label class="event_label" for="game_description">Game Description</label>
            <div>
                <textarea name="game_description" required maxlength=400>{{ $game->game_description }}</textarea>
            </div>
        </div>
        <div>
        <button class="button_events_edit_los" type="submit">Update game</button>
        <a href="\games"><button class="button_events_back">Back</button></a>    
    </form>
    <div class="game_pos_del_but"> 
        <form method="POST" action="/games/{{ $game->id }}">       
            {{-- {{ method_field('DELETE') }}
            {{ csrf_field() }} --}}
            @method('DELETE')
            @csrf
            <button class="button_events_delete_los" type="submit">Delete game</button>
        </form>  
    </div>
</div>   

@endsection

@else 'Acces not allowed, only for admin!'
@endif
