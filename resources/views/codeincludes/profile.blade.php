<head>
    <link rel="stylesheet" href="{{ asset('/css/profile_personalpage.css') }}">
</head>

<div class="profile_container">
    <div class="profile_boxes debug">
        <div class="photo_button_container">
            <div class="photo_box debug"></div>
            <input type="file" class="upload_button" placeholder="upload img">
        </div>
        <div class="input_container">
            <input type="text" name="" placeholder="nickname" class="input_profile_page">
            <input type="text" name="" placeholder="first name" class="input_profile_page">
            <input type="text" name="" placeholder="last name" class="input_profile_page">
            <input type="email" name="" placeholder="email" class="input_profile_page">
            <input type="password" name="" placeholder="password" class="input_profile_page"><br />
            <div class="input_flex">
                <input type="radio" name="gender" value="male" class="input_radio"><span>male</span>
            </div>
            <div class="input_flex">
                <input type="radio" name="gender" value="female" class="input_radio"><span>female</span>
            </div>
            <div class="input_flex"> <input type="radio" name="gender" value="gender neutral" class="input_radio"><span>gender
                    neutral</span>
            </div>
            <span class="separate_span">age</span>
            <input type="range" name="age" min="18" max="99" placeholder="" class="input_range">
        </div>
        <div class="who_am_i">
            <textarea class="text_area" placeholder="write something about you..."></textarea>
            <div class="see_personal_page">
                <button class="button_personal_view">see personal page</button>

            </div>
        </div>

    </div>


    <div class="profile_boxes debug"></div>
    <div class="profile_boxes debug"></div>
</div>
