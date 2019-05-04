@if (Auth::user() && Auth::user()->role == 'admin')

@extends('master')

<!--Title on tab current page -->
@section('title', 'admin')

@section('content')
    <!--Name / logo landingpage -->
    @section('logo/menu')
    @include ('codeincludes/newmenu')

<head>
    <link rel="stylesheet" href="{{ asset('/css/adminevents.css') }}">
</head>
<body>

<div class="container_events">
    <div class="container_events_title">
        <h1>Admin User</h1>
    </div>
    {{-- <div class="container_events_total">
        total users: {{ $users->total() }}
    </div>
    <div class="container_events_table">
        <table>
        <th>Nick name</th><th>Role</th><th>other</th><th>created at</th><th>updated at</th>    
        @foreach ($personalpages as $personalpage)
            <tr>
                <td><a href="/personalpages/{{ $user->id }}">{{ $user->name }}</a></td>
                <td>{{ $user->role }}</td>
                <td>xx</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td><a href="/personalpages/{{ $user->id }}/edit"><button class="button_events_edit">edit</button></a></td>
                <td>
                    <form method="POST" action="/personalpages/{{ $user->id }}">       
                        @method('DELETE')
                        @csrf
                        <button class="button_events_delete" type="submit">Delete game</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>  
    </div> {{-- end div container events table  --}}
    <a href="{{$personalpages->previousPageUrl()}}">previous page</a>
    <a href="{{$personalpages->nextPageUrl()}}">next page</a> 
    <div class=container_events_create>
        <a href="/personalpages/create"><button class="button_events_create">Create user</button></a>
        <a href="admin"><button class="button_events_back">Admin home</button></a>    
    </div> --}}
   </div>  {{-- end container events --}}
@endsection

@else 'Acces not allowed, only for admin!'
@endif

