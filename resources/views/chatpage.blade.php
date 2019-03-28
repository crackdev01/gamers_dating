@extends('master')

<!--Title on tab current page -->
@section('title', 'Chat') 

<!--Name / logo landingpage -->
@section('logo/menu')
@include ('codeincludes/newmenu')

<!-- Chat page -->
@section('chat')
@include('codeincludes/chat')

{{-- @section('content')
    <h1>chatpage</h1>
@endsection     --}}
