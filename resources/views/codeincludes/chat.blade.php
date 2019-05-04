<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- include css -->
    {{-- <link rel="stylesheet" href="{{ asset('/css/chatpage.css') }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>


@section('chat')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Welcome to Player 2 Chat</div>

                <div class="card-body" id="app">
                <chat-app :user="{{ auth()->user() }}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

</html>

<style lang="scss" scoped>
.card-header {
    color: red;
    font-family: 'Poppins', sans-serif;
    font-size: 20px;
    background-color: white;
    font-weight: bold;
}

.card-body {
    
}
</style>

<script src="/js/vue.js"></script>