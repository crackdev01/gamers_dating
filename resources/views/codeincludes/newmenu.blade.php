<head>
    <!-- include css -->
    <link rel="stylesheet" href="{{ asset('/css/newmenu.css') }}">
</head>
<body>

    <!-- Menu button top right------------------------>
    <header class="">
        <div class="photo_container">
                <img src="/images/logo_new.jpg" alt="logo" />
            </div>

        <div class="menu-btn">
            <div class="btn-line"></div>
            <div class="btn-line"></div>
            <div class="btn-line"></div>
        </div>
        <!-- Menu navigation menu text-------------------->
        <nav class="menu">
            <div class="menu-branding">
                <div class="menu-text">
                    <span class="text1">Navigation</span>
                    <span class="text2">Menu</span>
                </div>
            </div>
            <!-- Menu links------------------------------------>
            <ul class="menu-nav">
                <li class="nav-item">
                    <a href="/personaledit" class="nav-link">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/home" class="nav-link">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/home" class="nav-link">
                        Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Authentication Links -->
    @guest
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    @if (Route::has('register'))
        <a href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
    @else
        <div class="" aria-labelledby="navbarDropdown"></div>
    @endguest


        <script src="/js/menu.js"></script>
    </body>