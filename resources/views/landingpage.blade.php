<!--Extend the master.blade.php -->
@extends('master')

<!--Title on tab current page -->
@section('title')
    landingpage
@endsection   

<!--Name / logo landingpage -->
@section('name/logo')
    <h1>landingpage</h1>
@endsection 

<!--Login -->
@section('login')
@include ('codeincludes/login')
@endsection


<!--Register form -->
@section('registerform')
@include ('codeincludes/register')
@endsection
