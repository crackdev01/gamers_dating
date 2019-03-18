@extends('events.layout')

@section('content')
    <h1>Edit Event</h1>

<form method="POST" action="/events/{{ $event->id }}">
       {{ method_field('PATCH') }}
       {{-- to protect against cross site... --}}
       {{ csrf_field() }}  
        <div>
            <label class="label" for="event_name">Title</label>
            <div>
                <input type="text" name="event_name" placeholder="Event name" value="{{ $event->event_name }}">
            </div>
        </div>
        <div>
            <label class="label" for="event_date">Title</label>
            <div>
                <input type="text" name="event_date" placeholder="Event date" value="{{ $event->event_date }}">
            </div>
        </div>
        <div>
            <label class="label" for="event_time">Title</label>
            <div>
                <input type="text" name="event_time" placeholder="Event time" value="{{ $event->event_time }}">
            </div>
        </div>
        <div>
            <label class="label" for="event_name">Title</label>
            <div>
                <input type="text" name="event_inschrijven_tm" placeholder="inschrijven t/m" value="{{ $event->event_inschrijven_tm }}">
            </div>
        </div>
        <div>
            <label class="label" for="event_name">Title</label>
            <div>
                <input type="text" name="event_image_url" placeholder="inschrijven t/m" value="{{ $event->event_image_url }}">
            </div>
        </div>
        <div>
            <label class="label" for="event_description">Description</label>
            <div>
                <textarea name="event_description">{{ $event->event_description }}</textarea>
            </div>
        </div>
        <div>
       

        <button type="submit">Update event</button>
    </form>    

    <br>
<form method="POST" action="/events/{{ $event->id }}">       
    {{-- {{ method_field('DELETE') }}
    {{ csrf_field() }} --}}
    @method('DELETE')
    @csrf
    <button type="submit">Delete event</button>
</form>    

@endsection