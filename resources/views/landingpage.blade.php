<!--Extend the master.blade.php -->
@extends('master')

{{-- <link href="{{ asset('resources/sass/landing.scss') }}" rel="stylesheet"> --}}

{{-- @include ('resources/sass/landing.scss') --}}

<!--Title on tab current page -->
@section('title', 'Welcome')

<!--Name / logo landingpage -->
@section('name/logo')
    <h1>landingpage</h1>

<!--Login -->
@section('login')
@include ('codeincludes/login')

<!--Register form -->
@section('registerform')
@include ('codeincludes/register')


@endsection
