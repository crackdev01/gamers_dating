<head>
  <!-- include css -->
  <link rel="stylesheet" href="{{ asset('/css/navbar.css') }}">
</head>

<div class="container">
    <div class="navbar_container">
        <div class="photo_container">
            <img src="../images/logo_new.jpg" alt="logo" />
        </div>

        <div class="hamburger_container">
            <div class="logout">
                <ul>
                    <li id="one"> <a href="#">{{ Auth::user()->name }}</a></li>
                    <li id="two"><a href="#">events</a></li>
                    <li id="three"><a href="#">games</a></li>
                    <li id="four"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li id="five"><a href="#">admin</a></li>
                    <li id="hamburger_menu">
                        <div class="bar1" id="bar1"></div>
                        <div class="bar1" id="bar2"></div>
                        <div class="bar3" id="bar3"></div>
                    </li>
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
<script src="js/navbar.js"></script>