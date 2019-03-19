@extends('events.layout')

@section('content')
    <h1>Edit Event</h1>

<form method="POST" action="/personalpages/{{ $personalpage->id }}">
       {{ method_field('PATCH') }}
       {{-- to protect against cross site... --}}
       {{ csrf_field() }}  
        <div>
            <label class="label" for="personal_firstname">First name</label>
            <div>
                <input type="text" name="personal_firstname" placeholder="First name" value="{{ $personalpage->personal_firstname }}">
            </div>
        </div>
        <div>
            <label class="label" for="personal_lastname">Last name</label>
            <div>
                <input type="text" name="personal_lastname" placeholder="Lastname" value="{{ $personalpage->personal_lastname }}">
            </div>
        </div>
        <div>
            <label class="label" for="personal_nickname">Nick name</label>
            <div>
                <input type="text" name="personal_nickname" placeholder="Nickname" value="{{ $personalpage->personal_nickname }}">
            </div>
        </div>
        <div>
            <label class="label" for="personal_gender">gender</label>
            <div>
                <input type="text" name="personal_gender" placeholder="Gender" value="{{ $personalpage->personal_gender }}">
            </div>
        </div>
        <div>
            <label class="label" for="personal_age">Age</label>
            <div>
                <input type="text" name="personal_age" placeholder="Age" value="{{ $personalpage->personal_age }}">
            </div>
        </div>
        <div>
            <label class="label" for="personal_location">Location</label>
            <div>
                <input type="text" name="personal_location" placeholder="Location" value="{{ $personalpage->personal_location }}">
            </div>
        </div>
        <div>
        <div>
            <label class="label" for="personal_food">Favorite food</label>
            <div>
                <input type="text" name="personal_food" placeholder="favorite food" value="{{ $personalpage->personal_food }}">
            </div>
        </div>    
            <label class="label" for="personal_image_url">Title</label>
            <div>
                <input type="text" name="personal_image_url" placeholder="Your photo" value="{{ $personalpage->personal_image_url }}">
            </div>
        </div>
        <div>
            <label class="label" for="personal_info">Information about you</label>
            <div>
                <textarea name="personal_info">{{ $personalpage->personal_info }}</textarea>
            </div>
        </div>
        <div>
       

        <button type="submit">Update personalpage</button>
    </form>    

    <br>
<form method="POST" action="/personalpages/{{ $personalpage->id }}">       
    {{-- {{ method_field('DELETE') }}
    {{ csrf_field() }} --}}
    @method('DELETE')
    @csrf
    <button type="submit">Delete personalpage</button>
</form>    
<a href="/personalpages/">Home</a>  

@endsection