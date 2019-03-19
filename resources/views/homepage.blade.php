<!--Extend the master.blade.php -->
@extends('master')

<head>
<!--Title on tab current page -->
@section('title', 'Home')
</head>

<!--Name / logo landingpage -->
@section('logo/menu')
{{-- @include ('codeincludes/navbar') --}}
@include ('codeincludes/newmenu')

<!-- homepage links -->
@section('homepageLinks')
@include('codeincludes/homelinks')

