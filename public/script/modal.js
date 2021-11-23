// Get the modal
let homeModal = document.getElementById("popup");
let showHomeModal = document.getElementById("displayModal")
let spans = document.querySelectorAll("#closeMod");

showHomeModal.onload = function() {
  homeModal.style.display = "block";
}


for (let mod = 0; mod < spans.length; mod++) {
  spans[mod].addEventListener('click', function(){
    homeModal.style.display = "none";
  });
  
}
 

window.onclick = function(event) {
  if (event.target == homeModal) {
    homeModal.style.display = "none";
  }
}