<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script>

            // Enable pusher logging - don't include this in production
            // Pusher.logToConsole = true;
        
        //     var pusher = new Pusher('9f2233d7ce293b0e3461', {
        //       cluster: 'eu',
        //       forceTLS: true
        //     });
        
        //     var channel = pusher.subscribe('my-channel');
        //     channel.bind('my-event', function(data) {
        //       alert(JSON.stringify(data));
        //     });
        //   </script>
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