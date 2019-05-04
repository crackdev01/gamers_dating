@if (Auth::user() && Auth::user()->role == 'admin')
  
@extends('master')

<!--Title on tab current page -->
@section('title', 'admin')

@section('content')
    <!--Name / logo landingpage -->
    @section('logo/menu')
    @include ('codeincludes/newmenu')

<head>
    <!-- include css -->
    <link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">
</head>

<!-- flex container homepage -->
<div class="home_container">

    <!-- homepage link 1 -->
    <a href="events" target="_self" class="link_personal" title="Open admin event page">
        <div class="home_container-link1">
            <h1><i><span>A</span>dmin events</i></h1>
        </div>
    </a>

    <!-- homepage link 2 -->
    <a href="games" target="_self" class="link_chat" title="Open admin game Page">
        <div class="home_container-link2">
            <h1><i><span>A</span>dmin games</i></h1>
        </div>
    </a>

    <!-- homepage link 3 -->
    <a href="personal" target="_self" class="link_events" title="Open admin user Page">
        <div class="home_container-link3">
            <h1><i><span>A</span>dmin user</i></h1>
        </div>
    </a>

</div>
@endsection    

@else 'Acces not allowed, only for admin!'
@endif