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
        <h1>Admin Edit Event</h1>
    </div>

<form method="POST" action="/events/{{ $event->id }}">
       {{ method_field('PATCH') }}
       {{-- to protect against cross site... --}}
       {{ csrf_field() }}  
        <div>
            <label class="event_label" for="event_name">Event name</label>
            <div class="event_field">
                <input type="text" name="event_name" placeholder="Event name" value="{{ $event->event_name }}" autofocus required maxlength=60>
            </div>
        </div>
        <div>
            <label class="event_label" for="event_date">Event date</label>
            <div class="event_field">
                <input type="date" name="event_date" placeholder="Event date" value="{{ $event->event_date }}" required>
            </div>
        </div>
        <div>
            <label class="event_label" for="event_time">Event time</label>
            <div class="event_field">
                <input type="time" name="event_time" placeholder="Event time" value="{{ $event->event_time }}" required>
            </div>
        </div>
        <div>
            <label class="event_label" for="event_inschrijven_tm">Subscribe till</label>
            <div class="event_field">
                <input type="date" name="event_inschrijven_tm" placeholder="inschrijven t/m" value="{{ $event->event_inschrijven_tm }}" required>
            </div>
        </div>
        <div>
            <label class="event_label" for="event_name">Image name</label>
            <div class="event_field">
                <input type="text" name="event_image_url" placeholder="inschrijven t/m" value="{{ $event->event_image_url }}" required>
            </div>
        </div>
        <div>
            <label class="event_label" for="event_description">Event description</label>
            <div class="event_field">
                <textarea name="event_description" required maxlength=400>{{ $event->event_description }}</textarea>
            </div>
        </div>
        <button class="button_events_edit_los" type="submit">Update event</button>
    </form> 
    <div class="event_pos_back_but">
    <a href="\events"><button class="button_events_back">Back</button></a>    
    </div>
    <div class="event_pos_del_but">
    <form method="POST" action="/events/{{ $event->id }}">       
        @method('DELETE')
        @csrf
        <button class="button_events_delete_los" type="submit">Delete event</button>
    </form>
    <div>
</div>

@endsection

@else 'Acces not allowed, only for admin!'
@endif