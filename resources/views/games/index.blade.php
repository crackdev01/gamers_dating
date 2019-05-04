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
        <h1>Admin Games</h1>
    </div>
    <div class="container_events_total">
        total games: {{ $games->total() }}
    </div>
    <div class="container_events_table">
        <table>
        <th>Game name</th><th>Game genre</th><th>Game image name</th><th>created at</th><th>updated at</th>    
        @foreach ($games as $game)
            <tr>
                <td><a href="/games/{{ $game->id }}">{{ $game->game_name }}</a></td>
                <td>{{ $game->game_genre }}</td>
                <td>{{ $game->game_image_url }}</td>
                <td>{{ $game->created_at }}</td>
                <td>{{ $game->updated_at }}</td>
                <td><a href="/games/{{ $game->id }}/edit"><button class="button_events_edit">edit</button></a></td>
                <td>
                    <form method="POST" action="/games/{{ $game->id }}">       
                        @method('DELETE')
                        @csrf
                        <button class="button_events_delete" type="submit">Delete game</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>  
    </div> {{-- end div container events table  --}}
    <a href="{{$games->previousPageUrl()}}">previous page</a>
    <a href="{{$games->nextPageUrl()}}">next page</a> 
    <div class=container_events_create>
        <a href="/games/create"><button class="button_events_create">Create game</button></a>
        <a href="admin"><button class="button_events_back">Admin home</button></a>    
    </div>
   </div>  {{-- end container events --}}
@endsection

@else 'Acces not allowed, only for admin!'
@endif



