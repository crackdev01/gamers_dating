<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
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

{{-- eventpage --}}
@yield('content')

{{-- @yield('content1') --}}
    
</body>
</html>