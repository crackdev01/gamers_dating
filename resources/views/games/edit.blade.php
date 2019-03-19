@extends('events.layout')

@section('content')
    <h1>Edit Event</h1>

<form method="POST" action="/games/{{ $game->id }}">
       {{ method_field('PATCH') }}
       {{-- to protect against cross site... --}}
       {{ csrf_field() }}  
        <div>
            <label class="label" for="game_name">Title</label>
            <div>
                <input type="text" name="game_name" placeholder="Game name" value="{{ $game->game_name }}">
            </div>
        </div>
        <div>
            <label class="label" for="game_genre">Title</label>
            <div>
                <input type="text" name="game_genre" placeholder="Game genre" value="{{ $game->game_genre }}">
            </div>
        </div>
        <div>
            <label class="label" for="game_image_url">Title</label>
            <div>
                <input type="text" name="game_image_url" placeholder="Image name" value="{{ $game->game_image_url }}">
            </div>
        </div>
        <div>
            <label class="label" for="game_description">Description</label>
            <div>
                <textarea name="game_description">{{ $game->game_description }}</textarea>
            </div>
        </div>
        <div>
       

        <button type="submit">Update game</button>
    </form>    

    <br>
<form method="POST" action="/games/{{ $game->id }}">       
    {{-- {{ method_field('DELETE') }}
    {{ csrf_field() }} --}}
    @method('DELETE')
    @csrf
    <button type="submit">Delete game</button>
</form>    
<a href="/games/">Home</a>  

@endsection