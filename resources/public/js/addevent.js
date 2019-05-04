console.log("addevent.js gorillapower");
console.log('hoi');

function addevent(event_id) {

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
    console.log('eventid:' , event_id);
    $.ajax({
            /* the route pointing to the post function */
            url: '/addevent',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), eventid:event_id},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                console.log('succes');    
                     
                
            console.log(data.msg);
            if (data.msg == 'yes') {
                $("#event_img"+event_id).attr("src","/images/event_on.gif"); 
            }
            else {
                $("#event_img"+event_id).attr("src","/images/event_off.gif"); 
            }
          
            }    
        });
}; //end function 