<!--Extend the master.blade.php -->
@extends('master')

<head>
    <!-- include css -->
    <link rel="stylesheet" href="{{ asset('/css/landingpage.css') }}">
    <!--Title on tab current page -->
    @section('title', 'Player 2')
</head>

<!--Name / logo landingpage -->
<div class="container_landing">
    @section('name/logo')
    @include ('codeincludes/namelogo')

    <!--right side landingpage Login flex2 top-->
    <div class="flex2">
        @section('login')
        @include ('codeincludes/login')


        <!--right side landingpage Register form flex2 middle-->
        @section('registerform')
        @include ('codeincludes/register')

        <!--right side landingpage Register form flex2 middle-->
        @section('agreement')
        @include ('codeincludes/agreement')   
    </div>
</div>

<script src="/js/geolocation.js"></script>

@endsection
