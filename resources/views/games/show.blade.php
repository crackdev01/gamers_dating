@extends('games.layout')

@section('content')
    <h1>Show Game</h1>

    
            
            <div>
                {{ $game->game_name }}
             </div>
                   
            <div>
              {{ $game->game_genre }}"
            </div>
             
        <div>
            
            {{ $game->game_image_url }}"
        </div>
        <div>
           
        {{ $game->game_description }}
            
        </div>

        <p>
        <a href="/games/{{ $game->id }}/edit">Edit</a>
        </p>    
        <form method="POST" action="/games/{{ $game->id }}">       
            {{-- {{ method_field('DELETE') }}
            {{ csrf_field() }} --}}
            @method('DELETE')
            @csrf
            <button type="submit">Delete game</button>
        </form>  
        <a href="/games/">Home</a>  

@endsection    