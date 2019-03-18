@extends('master')

<head>
    <!-- include css -->
    <link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">
    <!--Title on tab current page -->
    @section('title', 'Homepage')
</head>

@section('content')
@endsection
<div class="container">
    <div class="navbar_container">
        <div class="photo_container">
            <img src="../images/logo_new.jpg" alt="logo" />
        </div>
        <div class="hamburger_container">
            <div class="logout">
                <ul>
                    <li> <a href="#">{{ Auth::user()->name }}</a></li>
                    <li><a href="#">events</a></li>
                    <li><a href="#">games</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li><a href="#">admin</a></li>
                    <li id="hamburger_menu"></li>
                </ul>
            </div>
        </div>



    </div>


    <!-- Authentication Links -->
    @guest
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    @if (Route::has('register'))
    <a href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
    @else

    <div class="" aria-labelledby="navbarDropdown">
       
    </div>
    @endguest



</div>