document.getElementById('terms2').addEventListener ("click", function(){
    getPermission();
});

function getPermission() {

var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
// makes the modal appear
modal.style.display = "flex";

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
}
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
}
document.getElementById("registerButton").addEventListener ("click", function(){
    getLocation();
});

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

// function showPosition(position) {
//   x.innerHTML = "Latitude: " + position.coords.latitude + 
//   "<br>Longitude: " + position.coords.longitude; 
// }