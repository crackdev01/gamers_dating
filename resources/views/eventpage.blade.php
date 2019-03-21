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
        
           <a href="/addevent/{{ $event->id }}">join event</a>

           
           @if ($user->events()->where('event_id', $event -> id)->exists())
           {
            aangemeld   
           }
           @else {
               afgemeld
           }
           @endif
    </li>
    @endforeach
    <a href="{{$events->previousPageUrl()}}">previous page</a>
    <a href="{{$events->nextPageUrl()}}">next page</a>
    total events: {{ $events->total() }}
@endsection    



   
            


      

