@extends('master')

<!--Title on tab current page -->
@section('title', 'events')

@section('content')
    <h1>eventpage</h1>
    <br>
    @foreach ($events as $event)
    <li>
        <a href="/events/{{ $event->id }}">
        {{ $event->event_name }}</a>
        
           <a href="/addevent">join event</a>
        
    </li>
    @endforeach
@endsection    



   
            


      

