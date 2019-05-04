<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
</head>
<body>

<!-- included on every page except the landingpage!! -->
@yield('logo/menu')

<!-- included on landingpage only! -->
@yield('name/logo')
@yield('login')
@yield('registerform')
@yield('agreement')

<!-- included on homepage only -->
@yield('homepageLinks')

<!-- included on chatpage only -->
@yield('chat')

{{-- eventpage --}}
@yield('content')

{{-- @yield('content1') --}}
    
</body>
</html>