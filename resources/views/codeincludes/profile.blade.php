<head>
     <!-- provide the csrf token -->
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('/css/profile_personalpage.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
</head>
{{-- start profile box 1 --}}
<div class="profile_container">
    <div class="profile_boxes">
            <div class="filter_flex">
                    <div class="filter_name">I'm looking for...</div>
                    <form id="findyourmatchform">
                        {{-- to protect against cross site... --}}
                        {{-- @csrf --}}
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
                            <div><input type="range" oninput="ageSlider(this.value)" name="filter_age" min="18" max="99" placeholder="" class="filter_age">
                                <span id="ageOutput"></span>
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
                                {{-- <button type="submit" class="find_matches_button">Find your match!</button> --}}
                                {{-- <button type="button" class="find_matches_button" id=getRequest>Find your match!</button> --}}
                                <a class="find_matches_button" onclick="findyourmatch(this.form)"><p>Find your match!</p></a>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="matches_flex" id="filterResults">
                                                
                              
                @isset($filterResults)    
                    @foreach ($filterResults as $filterResult) 
                    <div class="matches_card">
                        <a href="#" class="card_photo_box"><img src="../images/profile_images/{{ $filterResult->personal_image_url }}" alt=""/></a>
                        <div class="card_name_box">{{ $filterResult->personal_firstname }}</div>
                        <a onclick="mydates('{{$filterResult->id}}')" id="card_button_box"></a>
                    </div>
                    @endforeach
                @endisset

                               
               </div>
    </div>
    {{-- Start profile box 2 --}}
    <div class="profile_boxes relative_box">
    </div>
    {{-- Start profile box 3 --}}
    <div class="profile_boxes">
        <div class="current_dates_container">
            <div class="filter_name">Current dates</div>
                <div id = "mydates" class="current_dates_box">
                
                @isset($favorites)
                    @foreach($favorites as $favorite)
                        
                        <div class="matches_card">
                        <a href="#" class="card_photo_box"><img src="/images/profile_images/{{ $favorite->personal_image_url }}" alt=""/></a>
                        <div class="card_name_box">{{ $favorite->personal_firstname }}</div>
                        <a onclick="mydates('{{ $favorite->id }}')"><div class="delete_mydate"><i class="fas fa-user-times"></i></div></a>
                        </div>

                    @endforeach
                @endisset   

            {{-- <div>{{$loaddates}} in this box your favorites will appear if you click the heart</div> --}}
                
                          
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
<script>
    
        function mydates(personalId) {
            //alert(argument);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                    /* the route pointing to the post function */
                    url: '/getdates',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), mydate:personalId},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        
                    //alert(JSON.stringify(data.msg));
                    //dates = data.msg[1].personal_firstname;    

                    dates="";     
                    data.msg.forEach(function(favorite) {
                         //alert(favorite.personal_firstname);
                         deletebutton = favorite.id;
                         dates+= '<div class="matches_card">';
                         dates+= '<a href="#" class="card_photo_box"><img src="/images/profile_images/' + favorite.personal_image_url + '" alt=""/></a>';
                         dates+= '<div class="card_name_box">' + favorite.personal_firstname + '</div>';
                         dates+= '<a onclick="mydates('+deletebutton+')"><div class="delete_mydate"><i class="fas fa-user-times"></i></div></a>';
                         dates+= '</div>';
                         //dates+= favorite.personal_firstname
                         });


                    //alert(dates);    
                    $("#mydates").html(dates); 
                    }    
                });
        };  
       
        console.log("main.js gorillapower");

        // $(document).ready(function() {
        //     $('#getRequest').click(function(){
        //         $.get('getRequest', function(data){
        //             console.log(data);
        //         });
        //     });
        //     $('#register').submit(function(){
        //         var fname = $('#')
        //     })
        // });
        

        // function findyourmatch(form) {
        //     var naam = form.filter_gender.value;
        //     console.log(naam);
        // }

        function findyourmatch(form) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // the filter parameters
            var fgender = $("input[name=filter_gender]:checked").val();
            var fage = $("input[name=filter_age]").val();
            var fdistance = $("input[name=filter_distance]").val();
            var fgenre = $("input[name=filter_genre]").val();
            console.log(fgender,fage,fdistance,fgenre);
            $.ajax({
                    /* the route pointing to the post function */
                    url: '/findyourmatch',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), gender:fgender, age:fage, distance:fdistance, genre:fgenre},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        
                    //alert(JSON.stringify(data.msg));
                    // dates = data.msg[1].personal_firstname;    

                    foundMatches="";     
                    data.msg.forEach(function(filterResult) {

                    showProfile = filterResult.id;
                    
                    foundMatches+= '<div class="matches_card">';
                    foundMatches+= '<a href="#" class="card_photo_box"><img src="/images/profile_images/' + filterResult.personal_image_url + '" alt=""/></a>';
                    foundMatches+= '<div class="card_name_box">' + filterResult.personal_firstname + '</div>';
                    foundMatches+= '<a onclick="mydates(' + filterResult.id + ')" id="card_button_box"></a>';
                    foundMatches+= '</div>';             
                        
                    console.log(filterResult);
                        
                    });


                    //alert('dates');    
                    $("#filterResults").html(foundMatches); 
                    }    
                });
        };  

    </script>
    <script src="/js/profile.js"></script>

