document.getElementById('buttonPersonalView').addEventListener ('click', openView);

function openView() {
document.getElementById('profileContainer').style = "display: none";
document.getElementById('personalPopup').style.display = "flex";
} 

function ageSlider(val) {
    document.getElementById("ageOutput").innerHTML = val; 
  }

  document.getElementById("distanceOutput").innerHTML = '--';

  function distanceSlider(val) {
    document.getElementById("distanceOutput").innerHTML = val; 
  }


  