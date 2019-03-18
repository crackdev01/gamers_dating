@extends('events.layout')

@section('content')
    <h1>Show Event</h1>

    
            
            <div>
                {{ $event->event_name }}
             </div>
                   
            <div>
              {{ $event->event_date }}"
            </div>
        
        <div>
          
             {{ $event->event_time }}"
        </div>
        <div>
            
             {{ $event->event_inschrijven_tm }}"
        </div>
        <div>
            
            {{ $event->event_image_url }}"
        </div>
        <div>
           
        {{ $event->event_description }}
            
        </div>

        <p>
        <a href="/events/{{ $event->id }}/edit">Edit</a>
        </p>    

@endsection    