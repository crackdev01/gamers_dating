<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/personal_profile_edit.css') }}">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<div class="container_edit">
    <div class="profile_container" id="profileContainer">
        <div class="photo_button_container">
            <div class="photo_box" id="photo_holder"><img src="images/profile_images/{{ $personalpage->personal_image_url }}" /></div>
            <form method="POST" action="/personalpages/{{ $personalpage->id }}" enctype="multipart/form-data">
                {{ method_field('PATCH') }} {{-- to protect against cross site... --}} {{ csrf_field() }}
            </div>
            <div class="upload_button_box"><input type="file" class="upload_button" placeholder="upload img" name="personal_image"></div>
            <div class="input_container">
                <input type="text" name="personal_firstname" placeholder="first name"
                    value="{{ $personalpage->personal_firstname }}" class="input_profile_page">
                <input type="text" name="personal_lastname" placeholder="last name"
                    value="{{ $personalpage->personal_lastname }}" class="input_profile_page">
                <input type="text" name="user_nickname" placeholder="nickname" value="{{ Auth::user()->name }}"
                    class="input_profile_page">
                <input type="email" name="user_email" placeholder="email" value="{{ Auth::user()->email }}"
                    class="input_profile_page">
                <div id="changePassword">change password</div>
                <div id="password_modal">
                    <div class="old_password_text">Please confirm your password</div>
                    <div class="old_password">
                        <input id="oldPassword" type="password" name="old_password" autofocus>
                        <div id="oldPasswordButton">confirm</div>
                    </div>
                    <div id="new_password_text">Choose a new password and save your changes</div>
                    <div id="new_password"><input type="password" name="password"></div>
                </div>
                <span class="separate_span">gender</span>
                <div class="input_flex">
                    <input type="radio" name="personal_gender" {{ ($personalpage->personal_gender=='male') ? 'checked="checked"
                    ' : '' }} value="male" class="input_radio">
                    <span class="checkmark"></span><span class="gender_span">male</span>
                </div>
                <div class="input_flex">
                    <input type="radio" name="personal_gender" {{ ($personalpage->personal_gender=='female') ? 'checked="checked"
                    ' : '' }} value="female" class="input_radio">
                    <span class="checkmark"></span><span class="gender_span">female</span>
                </div>
                <div class="input_flex"> <input type="radio" name="personal_gender" {{ ($personalpage->personal_gender=='gender neutral') ? 'checked="checked"
                    ' : '' }} value="gender neutral" class="input_radio"><span class="checkmark"></span><span
                        class="gender_span">gender neutral</span>
                </div><br />
                <span class="separate_span">age</span>
                <div class="age_box_container">
                    <input type="range" oninput="ageSlider(this.value)" name="personal_age" min="18" max="99"
                        placeholder="" value="{{ $personalpage->personal_age }}" class="input_range">
                    <span id="ageOutput">{{ $personalpage->personal_age }}</span>
                </div>
            </div>
            <div class="who_am_i">
                <textarea class="text_area" placeholder="write something about yourself..."
                    name="personal_info">{{ $personalpage->personal_info }}</textarea>
                <div class="see_personal_page">
                    <div class="button_personal_view" id="buttonPersonalView">my personal page</div>
                    <button type="submit" class="button_save_changes">save my changes</button>
                </div>
            </div>
        </form>
    </div>
    {{-- start personal popup div --}}
    <div id="personalPopup">
        <div class="photo_button_box">
            <a href="" class="back_button"><img src="/images/back_button.png" alt="" /></a>
            <div class="personal_popup_photo_box"><img src="images/profile_images/{{ $personalpage->personal_image_url }}">
            </div>
        </div>
        <div class="personal_popup_input_box">
            <div class="input_area">
                <div class="personal_popup_input_area">nickname:</div>
                <span class="personal_popup_db_input">{{ Auth::user()->name }}</span>
            </div>
            <div class="input_area">
                <div class="personal_popup_input_area">gender:</div>
                <span class="personal_popup_db_input">{{ $personalpage->personal_gender }}</span>
            </div>
            <div class="input_area">
                <div class="personal_popup_input_area">age:</div>
                <span class="personal_popup_db_input">{{ $personalpage->personal_age }}</span>
            </div>
            <div class="input_area">
                <div class="personal_popup_input_area">location:</div>
                <span class="personal_popup_db_input"></span>
            </div>
        </div>
        <div class="personal_page_about_me_container">
            {{ $personalpage->personal_info }}
        </div>
        <div class="personal_page_games_container">
            <div class="personal_page_games_name_box">games I like</div>
            <div class="personal_page_games_game_link_card_box">
                @foreach($games as $game)
                <div class="personal_page_games_image"><img src="/images/games/{{ $game->game_image_url }}" alt="" title="{{ $game->game_description }}" /></div>
                @endforeach    
            </div>
        </div>
    </div>
</div>
</div>
<script src="/js/profile_edit.js"></script>
<script src="/js/profile.js"></script>
