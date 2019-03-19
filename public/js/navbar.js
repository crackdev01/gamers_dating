var counter = 0;
var one = document.getElementById('one');
var two = document.getElementById('two');
var three = document.getElementById('three');
var four = document.getElementById('four');
var five = document.getElementById('five');
var bar1 = document.getElementById('bar1');
var bar2 = document.getElementById('bar2');
var bar3 = document.getElementById('bar3');

document.getElementById('hamburger_menu').addEventListener('click', checkCounter);

function checkCounter() {
    if (counter == 0) {
        navbarOpen();
    }
        else {
        navbarClose();
        }
    }


function navbarOpen() {
    one.style.transform = "translateY(0px)";
    two.style.transform = "translateY(0px)";
    three.style.transform = "translateY(0px)";
    four.style.transform = "translateY(0px)";
    five.style.transform = "translateY(0px)";
    bar1.style.transform = "rotate(-45deg)";
    bar1.style.width = "40%";
    bar2.style.transform = "translateX(4px)";
    bar2.style.width = "80%";
    bar3.style.transform = "rotate(45deg)";
    bar3.style.width = "40%";
    counter = 1;
}

function navbarClose() {
    one.style.transform = "translateY(-100px)";
    two.style.transform = "translateY(-100px)";
    three.style.transform = "translateY(-100px)";
    four.style.transform = "translateY(-100px)";
    five.style.transform = "translateY(-100px)";
    bar1.style.transform = "rotate(0deg)";
    bar1.style.width = "60%";
    bar2.style.transform = "translateX(0px)";
    bar2.style.width = "60%";
    bar3.style.transform = "rotate(0deg)";
    bar3.style.width = "60%";
    counter = 0;
}