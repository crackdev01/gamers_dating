@extends('personalpages.layout')

@section('content')
    <h1>Show personalpage</h1>

            {{ Auth::user()->id }}
            <div>
                    {{ Auth::user()->id }}
            </div>
            <div>
                    {{ Auth::user()->name }}
            </div>
            <div>
                    {{ Auth::user()->email }}
            </div>
            click to change password
            <div>
                {{ $personalpage->personal_firstname }}
            </div>
            <div>
                {{ $personalpage->personal_lastname }}
            </div>
            <div>
                {{ $personalpage->personal_nickname }}
            </div>      
            <div>
              {{ $personalpage->personal_gender }}"
            </div>
            <div>
                {{ $personalpage->personal_gender }}
            </div>
            <div>
                {{ $personalpage->personal_age }}
            </div>      
            <div>
                {{ $personalpage->personal_location }}
            </div>
            <div>
                {{ $personalpage->personal_food }}
            </div>      
            <div>
                {{ $personalpage->personal_image_url }}"
            </div>           
            <div>
                {{ $personalpage->personal_info }}
            </div>

        <p>
        <a href="/personalpages/{{ $personalpage->id }}/edit">Edit</a>
        </p>    
        <form method="POST" action="/personalpages/{{ $personalpage->id }}">       
            {{-- {{ method_field('DELETE') }}
            {{ csrf_field() }} --}}
            @method('DELETE')
            @csrf
            <button type="submit">Delete personalpage</button>
        </form>  
        <a href="/personalpages/">Home</a>  

@endsection    