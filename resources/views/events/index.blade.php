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
        <h1>Admin Events</h1>
    </div>
    <div class="container_events_total">
    total events: {{ $events->total() }}
    </div>
    <div class="container_events_table">
        <table>
        <th>Event name</th><th>Event date</th><th>Event time</th><th>Subscribe date till</th><th>#Subscribers</th><th>Edit</th><th>Delete</th>    
        @foreach ($events as $event)
            <tr>
                <td><a href="/events/{{ $event->id }}">{{ $event->event_name }}</a></td>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->event_time }}</td>
                <td>{{ $event->event_inschrijven_tm }}</td>
                <td>{{ $event->event_count}}</td>
                <td><a href="/events/{{ $event->id }}/edit"><button class="button_events_edit">edit</button></a></td>
                <td>
                    <form method="POST" action="/events/{{ $event->id }}">       
                        @method('DELETE')
                        @csrf
                        <button class="button_events_delete" type="submit">Delete event</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>  
    </div> {{-- end div container events table  --}}
    <a href="{{$events->previousPageUrl()}}">previous page</a>
    <a href="{{$events->nextPageUrl()}}">next page</a> 
    <div class=container_events_create>
        <a href="/events/create"><button class="button_events_create">Create event</button></a>
        <a href="admin"><button class="button_events_back">Admin home</button></a>    
    </div>
</div>  {{-- end container events --}}

@endsection

@else 'Acces not allowed, only for admin!'
@endif


