@extends('master')

<!--Title on tab current page -->
@section('title', 'personal')

@section('content')
    <h1>personalpage</h1>
    <br>
    
    <div>
        userid:    {{ Auth::user()->id }}
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
@endsection    
