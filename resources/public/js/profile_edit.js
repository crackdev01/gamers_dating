document.getElementById('buttonPersonalView').addEventListener ('click', openView);

function openView() {
document.getElementById('profileContainer').style = "display: none";
document.getElementById('personalPopup').style.display = "flex";
} 

document.getElementById('changePassword').addEventListener ('click', changePassword);

var passwordCounter = 0;

function changePassword(){
    if (passwordCounter == 0) {
        document.getElementById('password_modal').style.display = "flex";
        passwordCounter = 1;
    }
        else {
            document.getElementById('password_modal').style.display = "none";
            passwordCounter = 0;
        }
    }

document.getElementById('oldPasswordButton').addEventListener ("click", openNewPassword);

function openNewPassword() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var password = $("input[name=old_password]").val();
    $.ajax({
        /* the route pointing to the post function */
        url: '/changepassword',
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), old_password:password},
        dataType: 'JSON',
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) { 
            if (data.msg == "valid") {
                document.getElementById('new_password_text').style.display = "block";
                document.getElementById('new_password').style.display = "flex";
                document.getElementById('oldPasswordButton').style.backgroundColor = "green";
                document.getElementById('oldPasswordButton').innerHTML = "confirmed";
                document.getElementById('oldPasswordButton').style.color = "white";
            } else {
                document.getElementById('oldPasswordButton').innerHTML = "invalid";
                document.getElementById('oldPasswordButton').style.color = "red";
                document.getElementById('oldPasswordButton').style.backgroundColor = "black";
            }
        }    
    });
};


