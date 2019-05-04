<head>
     <!-- provide the csrf token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/profile_personalpage.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
</head>
{{-- start profile box 1 --}}
<div class="profile_container" id="profileContainer">
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
                        <img class="card_photo_box" src="../images/profile_images/{{ $filterResult->personal_image_url }}" alt=""/>
                        <div class="card_name_box"><a onclick="getProfile({{ $favorite->id }})">{{ $filterResult->personal_firstname }}</a></div>
                        <a onclick="mydates('{{$filterResult->id}}')" id="card_button_box"></a>
                    </div>
                    @endforeach
                @endisset

                               
               </div>
    </div>
    {{-- Start profile box 2 --}}
    <div class="profile_boxes relative_box" id="dateprofile">
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
                        <div class="card_name_box"><a onclick="getProfile({{ $favorite->id }})">{{ $favorite->personal_firstname }}</a></div>
                        <a onclick="mydates('{{ $favorite->id }}')"><div class="delete_mydate"><i class="fas fa-user-times"></i></div></a>
                        </div>
                    @endforeach
                @endisset  
             {{-- <div>{{$loaddates}} in this box your favorites will appear if you click the heart</div> --}}     
            </div>
        </div>
        <div class="games_container">
                <div class="filter_name">My top 5 games</div>
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Game and click" />
             {{-- output of the selection --}}
             <div class="matches_flex">
             <div id="gamesselection2"></div>     
            <div id="getgames">
            {{-- output for the first run in ajax for the other ones  --}}
            @isset($myselectedgames)
                @foreach($myselectedgames as $myselectedgame)
                    <div class="matches_card">
                    <img class="card_photo_box" src="/images/games/{{$myselectedgame->game_image_url }}" alt=""/>
                    <div class="card_name_box"><a onclick="mygames({{ $myselectedgame->id }})">{{ $myselectedgame->game_name }}</a></div>
                    <a class="delete_knop" onclick="mygames({{ $myselectedgame->id }})">X</a>
                    </div>   
                @endforeach
            @endisset  

            
        </div>
        </div>
    </div>
    </div>

</div>

<script src="/js/profile.js"></script>

 
<script>
    $(document).ready(function(){
     
     fetch_customer_data();
     
     
     function fetch_customer_data(query = '') {
     
        console.log('hello : ',query); 
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
            url:'/live_search',
            type:'POST',
            data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), query:query},
            dataType:'JSON',
            success:function(data) {   
                //console.log(data.table_data); 
                console.log(JSON.stringify(data.result));   
                foundGames=""
                data.result.forEach(function(liveResult) {
                showProfile = liveResult.id;

            foundGames+= '<div class="matches_card">';
            //foundGames+= '<img class="card_photo_box" src="/images/profile_images/' + liveResult.game_image_url + '" alt=""/>';
            foundGames+= '<a class="output" onclick="mygames(' + liveResult.id +')">' + liveResult.game_name + '</a>';
            //foundGames+= '<a onclick="mydates(' + liveResult.id + ')" id="card_button_box"></a>';
            foundGames+= '</div>';            
        });

                $('#gamesselection2').show();
                $('#gamesselection2').html(foundGames);
                $('#total_records').text(data.total_data);
            }
        }); //end ajax
     }; //end function
     
     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_customer_data(query);
     }); //end function

    }); //end document

    function mygames(game_id) {
        console.log('selected :',game_id);

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
      url:'/my_games',
      type:'POST',
      data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), gameid:game_id},
      dataType:'JSON',
      success:function(data) {   
          //console.log(data.table_data); 
          console.log(JSON.stringify(data.result));   
          console.log('dataid :',data.id);  
          getGames = ""
          data.result.forEach(function(gamesSelection) {
          showProfile = gamesSelection.id;
     
         console.log('gamesselection',gamesSelection);
      
            getGames+= '<div class="matches_card">';
            getGames+= '<img class="card_photo_box" src="/images/games/' + gamesSelection.game_image_url + '" alt=""/>';
            getGames+= '<div class="card_name_box">' + gamesSelection.game_name + '</div>';
            getGames+= '<a class="delete_knop" onclick=mygames("'+ gamesSelection.id+ '")>X</a>';
            getGames+= '</div>';
  });

          $('#getgames').html(getGames);
          $('#gamesselection2').hide();
        
      }
  }); //end ajax
}; //end function
    
    
</script>


