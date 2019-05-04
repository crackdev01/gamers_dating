<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/eventpage.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/js/addevent.js"></script>
</head>

<div class="container_events">
    <div class="month_container">
        <a href="">january</a>
        <a href="">februari</a>
        <a href="">march</a>
        <a href="">april</a>
        <a href="">may</a>
        <a href="">june</a>
        <a href="">july</a>
        <a href="">august</a>
        <a href="">september</a>
        <a href="">october</a>
        <a href="">november</a>
        <a href="">december</a>
    </div>
    <div class="event_card_container">
        @foreach ($events as $event)
        <div class="card_image">
            <img src="/images/events/{{$event->event_image_url}}" class="background_image" alt="e3"/>
            @if ($user->events()->where('event_id', $event -> id)->exists()) 
                <a onclick="addevent({{ $event->id }})" class="join_event_button"><img id="event_img{{$event->id}}" src="/images/event_on.gif"  width="250%"></a>
            @else 
                <a onclick="addevent({{ $event->id }})" class="join_event_button"><img id="event_img{{$event->id}}" src="/images/event_off.gif" width="250%"></a>
            @endif
            <div class="card_name card_options">name: {{ $event->event_name }}</div>
            <div class="card_sign_in card_options">subscribe untill: {{ $event->event_inschrijven_tm }}</div>
            <div class="card_time card_options">time: {{ $event->event_time }}</div>
            <div class="card_date card_options">date: {{ $event->event_date }}</div>
            <div class="card_description" title="{{ $event->event_description }}">hover for description</div>
        </div>
        @endforeach
    </div>
      <div class="navigate_container">
        <a href="{{$events->previousPageUrl()}}">previous page</a>
        <a href="{{$events->nextPageUrl()}}">next page</a> 
      </div>
      <div class="total_events_container">
        total events: {{ $events->total() }}
      </div>
    
     
</div>

