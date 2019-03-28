<head>
    <link rel="stylesheet" href="{{ asset('/css/profile_personalpage.css') }}">
</head>
{{-- start profile box 1 --}}
<div class="profile_container">
    <div class="profile_boxes">
        <div class="photo_button_container">
            <div class="photo_box" id="photo_holder"><img src="/images/{{ $personalpage->personal_image_url }}"
                    class="photo_image" /></div>
            <input type="file" class="upload_button" placeholder="upload img">
        </div>
        <form method="POST" action="/personalpages/{{ $personalpage->id }}">
            {{ method_field('PATCH') }}
            {{-- to protect against cross site... --}}
            {{ csrf_field() }}
            <div class="input_container">
                <input type="text" name="personal_firstname" placeholder="first name"
                    value="{{ $personalpage->personal_firstname }}" class="input_profile_page">
                <input type="text" name="personal_lastname" placeholder="last name"
                    value="{{ $personalpage->personal_lastname }}" class="input_profile_page">
                <input type="text" name="user_nickname" placeholder="nickname" value="{{ Auth::user()->name }}"
                    class="input_profile_page">
                <input type="email" name="user_email" placeholder="email" value="{{ Auth::user()->email }}"
                    class="input_profile_page">
                <input type="password" name="user_password" placeholder="password" value="" class="input_profile_page">
                <span class="separate_span">gender</span>
                <div class="input_flex">
                    <input type="radio" name="personal_gender"
                        {{ ($personalpage->personal_gender=='male') ? 'checked="checked" ' : '' }} value="male"
                        class="input_radio"><span class="checkmark"></span><span class="gender_span">male</span>
                </div>
                <div class="input_flex">
                    <input type="radio" name="personal_gender"
                        {{ ($personalpage->personal_gender=='female') ? 'checked="checked" ' : '' }} value="female"
                        class="input_radio"><span class="checkmark"></span><span class="gender_span">female</span>
                </div>
                <div class="input_flex"> <input type="radio" name="personal_gender"
                        {{ ($personalpage->personal_gender=='gender neutral') ? 'checked="checked" ' : '' }}
                        value="gender neutral" class="input_radio"><span class="checkmark"></span><span
                        class="gender_span">gender neutral</span>
                </div><br />
                <span class="separate_span">age</span>
                <div class="age_box_container">
                    <input type="range" oninput="ageSlider(this.value)" name="personal_age" min="18" max="99"
                        placeholder="" value="{{ $personalpage->personal_age }}" class="input_range">
                    <span id="ageOutput"></span>
                </div>
            </div>
            <div class="who_am_i">
                <textarea class="text_area" placeholder="write something about yourself..."
                    name="personal_info">{{ $personalpage->personal_info }}</textarea>
                <div class="see_personal_page">
                    <button class="button_personal_view">my personal page</button>
                    <button type="submit" class="button_save_changes">save my changes</button>
                </div>
            </div>
        </form>
    </div>
    {{-- Start profile box 2 --}}
    <div class="profile_boxes">
        <div class="filter_flex">
            <div class="filter_name">I'm looking for...</div>
            <form method="GET" action="/profilepages/{{ $personalpage->id }}">
                {{-- to protect against cross site... --}}
                @csrf
                <div class="filter_options">
                    <span class="separate_span">gender</span>
                    <div class="radio_box_container">
                    <div class="input_radio_box">
                        {{-- to change the radio buttons here for responsive, change the width in class: input_radio_box
                        !!!!! --}}
                        <input type="radio" name="filter_gender" checked value="male" class="input_radio"><span class="checkmark"></span>male
                    </div>
                    <div class="input_radio_box">
                        <input type="radio" name="filter_gender" value="female" class="input_radio"><span class="checkmark"></span>female
                    </div>
                        <div class="input_radio_box2">
                        <input type="radio" name="filter_gender" value="gender neutral" class="input_radio"><span class="checkmark"></span>gender
                        neutral
                    </div>
                </div>
                    <span class="separate_span">age</span>
                    <div class="age_box">
                    <div><input type="range" name="filter_age" min="18" max="99" placeholder="" class="filter_age">
                    </div>
                    </div>
                    <span class="separate_span">max distance</span>
                    <div class="distance_box"><input type="range" name="filter_distance" oninput="distanceSlider(this.value)" min="0" max="500" placeholder="" id="distanceInput">
                    <span id="distanceOutput"></span><span class="font_box">Km</span>
                    </div>
                    <span class="separate_span">game genre</span>
                    <div class="genre_box">
                        <input list="genres" name="filter_genre" placeholder="choose a genre..." class="list_dropdown">
                        <datalist id="genres">
                            <option value="role playing game">
                            <option value="shooter">
                            <option value="action adventure">
                            <option value="online">
                            <option value="sandbox">
                            <option value="battle royale">
                            <option value="fighting">
                            <option value="strategy">
                            <option value="horror">
                        </datalist>
                        <button type="submit" class="find_matches_button">Find your match!</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="matches_flex">
        @isset($filterResults)    
            @foreach ($filterResults as $filterResult) 
            <div class="matches_card">
                <a href="#" class="card_photo_box"><img src="/images/{{ $filterResult->personal_image_url }}" alt=""/></a>
                <div class="card_name_box">{{ $filterResult->personal_firstname }}</div>
                <div id="card_button_box"></div>
            </div>
            @endforeach
        @endisset
        
       </div>
    </div>
    {{-- Start profile box 3 --}}
    <div class="profile_boxes">
        <div class="current_dates_container">
            <div class="filter_name">Current dates</div>
            <div class="current_dates_box">
                <div class="matches_card">
                    <a href="#" class="card_photo_box"><img src="" alt="" /></a>
                    <div class="card_name_box"></div>
                    <div id="card_delete_box"></div>
                </div>
                <div class="matches_card">
                    <a href="#" class="card_photo_box"><img src="" alt="" /></a>
                    <div class="card_name_box"></div>
                    <div id="card_delete_box"></div>
                </div>
                <div class="matches_card">
                    <a href="#" class="card_photo_box"><img src="" alt="" /></a>
                    <div class="card_name_box"></div>
                    <div id="card_delete_box"></div>
                </div>
                <div class="matches_card">
                    <a href="#" class="card_photo_box"><img src="" alt="" /></a>
                    <div class="card_name_box"></div>
                    <div id="card_delete_box"></div>
                </div>
                <div class="matches_card">
                    <a href="#" class="card_photo_box"><img src="" alt="" /></a>
                    <div class="card_name_box"></div>
                    <div id="card_delete_box"></div>
                </div>
            </div>

        </div>
        <div class="games_container">
            <div class="filter_name">My top 5 games</div>
            <div class="game_card">
                <a href="#" class="game_photo_box"><img src="" alt="" /></a>
                <input type="text" class="games_input" placeholder="find your game...">
                <div id="game_delete_box"></div>
            </div>
            <div class="game_card">
                <a href="#" class="game_photo_box"><img src="" alt="" /></a>
                <input type="text" class="games_input" placeholder="find your game...">
                <div id="game_delete_box"></div>
            </div>
            <div class="game_card">
                <a href="#" class="game_photo_box"><img src="" alt="" /></a>
                <input type="text" class="games_input" placeholder="find your game...">
                <div id="game_delete_box"></div>
            </div>
            <div class="game_card">
                <a href="#" class="game_photo_box"><img src="" alt="" /></a>
                <input type="text" class="games_input" placeholder="find your game...">
                <div id="game_delete_box"></div>
            </div>
            <div class="game_card">
                <a href="#" class="game_photo_box"><img src="" alt="" /></a>
                <input type="text" class="games_input" placeholder="find your game...">
                <div id="game_delete_box"></div>
            </div>
        </div>

    </div>

</div>
<script src="/js/profile.js"></script>
