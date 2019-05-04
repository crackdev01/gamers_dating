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
        <h1>Admin Show Game</h1>
    </div>
        <div>
            <label class="event_show_label" for="game_name">Game name :</label>
            {{ $game->game_name }}
        </div>
        <div>
            <label class="event_show_label" for="game_genre">Game genre :</label>
            {{ $game->game_genre }}
        </div>
        <div>
            <label class="event_show_label" for="game_name">Game image :</label>
            <br>
            <img src="\images\games\{{ $game->game_image_url }}">
        </div>
        <div>
            <label class="event_show_label" for="game_description">Game description :</label>
            {{ $game->game_description }}
        </div>

        <p>
            <a href="/games/{{ $game->id }}/edit"><button class="button_events_edit_los">Edit</button></a>
            <a href="/games"><button class="button_events_back">Back</button></a>  
            <div class="show_pos_del_but"> 
                <form method="POST" action="/games/{{ $game->id }}">       
                    {{-- {{ method_field('DELETE') }}
                    {{ csrf_field() }} --}}
                    @method('DELETE')
                    @csrf
                    <button class="button_events_delete_los" type="submit">Delete game</button>
                </form>  
            </div>  
        </p>   

@endsection  

@else 'Acces not allowed, only for admin!'
@endif

