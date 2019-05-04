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
        <h1>Admin Create Event</h1>
    </div>
    <form method="POST" action="/events">
        {{ csrf_field() }}
        <label class="event_label">Event name</label>
        <div class="event_field">
            <input type="text" name="event_name" placeholder="Event name" autofocus required maxlength=60>
        </div>
        <label class="event_label">Event date</label>
        <div class="event_field">
            <input type="date" name="event_date" placeholder="Event date" required>
        </div>
        <label class="event_label">Event time</label>
        <div>
            <input type="time" name="event_time" placeholder="Event time" required>
        </div>
        <label class="event_label">Subscribe till</label>
        <div>
            <input type="date" name="event_inschrijven_tm" placeholder="inschrijven t/m" required>
        </div>
        <label class="event_label">Event image</label>
        <div>
            <input type="text" name="event_image_url" placeholder="image naam" required maxlength=60>
        </div>
        <label class="event_label">Event description</label>
        <div>
            <textarea name="event_description" placeholder="Event description" required maxlength=400></textarea>
        </div>
        <button class="button_events_create" type="submit">Create event</button>
    </form> 
    <div class="event_pos_back_but"> 
        <a href="\events"><button class="button_events_back">Back</button></a> 
    </div>    
</div>
@endsection

@else 'Acces not allowed, only for admin!'
@endif


