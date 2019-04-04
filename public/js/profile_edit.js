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


