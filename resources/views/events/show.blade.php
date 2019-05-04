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
        <h1>Admin Show Event</h1>
    </div>
<div>
    <label class="event_show_label" for="event_name">Event name :</label>
    {{ $event->event_name }}
</div>
<div>
    <label class="event_show_label" for="event_name">Event date :</label>
    {{ $event->event_date }}
</div>
<div>
    <label class="event_show_label" for="event_time">Event time :</label>
    {{ $event->event_name }}
</div>
<div>
    <label class="event_show_label" for="event_time">Subscribe till :</label>
    {{ $event->event_inschrijven_tm }}
</div>   
<div>
    <label class="event_show_label" for="event_time">Event image name :</label><br>
    <img src="\images\events\{{ $event->event_image_url }}">
</div>              
<div>
    <label class="event_show_label" for="event_time">Event description :</label><br>
    {{ $event->event_description }}
</div>    
<p>
    <a href="/events/{{ $event->id }}/edit"><button class="button_events_edit_los">Edit</button></a>
    <a href="\events"><button class="button_events_back">Back</button></a>  
    <div class="show_pos_del_but">     
        <form method="POST" action="/events/{{ $event->id }}">       
            @method('DELETE')
            @csrf
            <button class="button_events_delete_los" type="submit">Delete event</button>
        </form> 
    </div> 
</p>        


@endsection    

@else 'Acces not allowed, only for admin!'
@endif