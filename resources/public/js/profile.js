function ageSlider(val) {
    document.getElementById("ageOutput").innerHTML = val; 
  }

  document.getElementById("distanceOutput").innerHTML = '--';

  function distanceSlider(val) {
    document.getElementById("distanceOutput").innerHTML = val; 
  }

  //function erik 
  
  function mydates(personalId) {
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
              // console.log('hello');
            //alert(JSON.stringify(data.msg));
            //dates = data.msg[1].personal_firstname;    

            dates="";     
            data.msg.forEach(function(favorite) {
                 //alert(favorite.personal_firstname);
                 deletebutton = favorite.id;
                 dates+= '<div class="matches_card">';
                 dates+= '<img class="card_photo_box" src="/images/profile_images/' + favorite.personal_image_url + '" alt=""/>';
                 dates+= '<div class="card_name_box"><a onclick="getProfile('+favorite.id+')">' + favorite.personal_firstname + '</a></div>';
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

//function erik
function findyourmatch(form) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // the filter parameters
    var fgender = $("input[name=filter_gender]:checked").val();
    var fage = $("input[name=filter_age]").val();
    var fdistance = $("input[name=filter_distance]").val();
    var fgenre = $("input[name=filter_genre]").val();
    // console.log(fgender,fage,fdistance,fgenre);
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
            foundMatches+= '<img class="card_photo_box" src="/images/profile_images/' + filterResult.personal_image_url + '" alt=""/>';
            foundMatches+= '<div class="card_name_box"><a onclick="getProfile(' + filterResult.id +')">' + filterResult.personal_firstname + '</a></div>';
            foundMatches+= '<a onclick="mydates(' + filterResult.id + ')" id="card_button_box"></a>';
            foundMatches+= '</div>';             
                
            console.log(filterResult);
                
            });

            //alert('dates');    
            $("#filterResults").html(foundMatches); 
            }    
        });
};  

//function erik
function getProfile(personalId) {
  document.getElementById('dateprofile').style.backgroundImage = "none";
  document.getElementById('dateprofile').style.boxShadow = "0px 0px 20px 0px red";
  // document.getElementById('dateprofile').style.border = "4px dotted red";
  document.getElementById('dateprofile').style.borderRadius = "10px";
  // document.getElementById('dateprofile').style.backgroundColor = "lightgrey";
 

  //alert(argument);
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
          /* the route pointing to the post function */
          url: '/getprofile',
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), mydate:personalId},
          dataType: 'JSON',
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) { 
          console.log(JSON.stringify(data.msg));
          console.log(data.msg);  
          console.log(data.nickname);
          console.log(data.datergames);
          console.log(data.user);


          profile="";     
          profile+='<div class="photo_button_box">';
          profile+='<div class="personal_popup_photo_box"><img src="/images/profile_images/'+data.msg.personal_image_url+'">';
          profile+='</div>';
          profile+='</div>';
          profile+='<div class="personal_popup_input_box">';
          profile+='<div class="input_area">';
          profile+='<div class="personal_popup_input_area">nickname:</div>';
          profile+='<span class="personal_popup_db_input">'+data.nickname+'</span>';
          profile+='</div>';
          profile+='<div class="input_area">';
          profile+='<div class="personal_popup_input_area">gender:</div>';
          profile+='<span class="personal_popup_db_input">'+data.msg.personal_gender+'</span>';
          profile+='</div>';
          profile+='<div class="input_area">';
          profile+='<div class="personal_popup_input_area">age:</div>';
          profile+='<span class="personal_popup_db_input">'+data.msg.personal_age+'</span>';
          profile+='</div>';
          profile+='<div class="input_area">';
          profile+='<div class="personal_popup_input_area">location:</div>';
          profile+='<span class="personal_popup_db_input"></span>';
          profile+='</div>';
          profile+='</div>';
          profile+='<div class="personal_page_about_me_container">';
          profile+=data.msg.personal_info;
          profile+='</div>';
          profile+='<div class="personal_page_games_container">';
          profile+='<div class="personal_page_games_name_box">games I like</div>';
          profile+='<div class="personal_page_games_game_link_card_box">';
          data.datergames.forEach(function(datergame) {
          profile+='<div class="personal_page_games_image"><img src="/images/games/'+datergame.game_image_url+'" alt="" title="{{ $game->game_description }}" /></div>';
          });  
          profile+='</div>';
          profile+='</div>';
    



               
          
          $("#dateprofile").html(profile); 
          }    
      });
};  
  