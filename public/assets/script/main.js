let slideIndex = 0;

function showSlides() {
var i;
var slides = document.querySelectorAll("#slides");
for (i = 0; i < slides.length; i++) {
  slides[i].style.display = "none";
  // slides[i].style.display = `translate`  
}
slideIndex++;
if (slideIndex > slides.length) {
  slideIndex = 1
}    
slides[slideIndex-1].style.display = "block";  
setTimeout(showSlides, 2000); // Change image every 2 seconds
}
showSlides();

const accs = document.querySelectorAll(".accord");

accs.forEach(acc => {
  acc.addEventListener("click", function() {
    this.classList.toggle("chev");
    let sidePanel = this.nextElementSibling;
    sidePanel.style.display === `none` ? sidePanel.style.display = `block` : sidePanel.style.display = `none`;
  })
});


// footer accordion
const accordions = document.querySelectorAll(".footer-accordion");

accordions.forEach(accordion => {
  accordion.addEventListener('click', function() {
    this.classList.toggle('active');
    let panel = this.nextElementSibling;
    panel.style.maxHeight ? panel.style.maxHeight = null : panel.style.maxHeight = panel.scrollHeight + "px";
  })
})

// show sideNav
const head = document.querySelector('#header')
const filtered = document.querySelector('#filtered')
const sideNav = document.querySelector('.side-nav')
const close = document.querySelector('.close')

filtered.style.backgroundColor = `#333333`
filtered.style.color = `#ffffff`
// close.style.color = `#ffff00`

filtered.addEventListener('click', showSideNav=()=> {
  if (sideNav.style.maxWidth) {
    sideNav.style.maxWidth = null
  } else {
    sideNav.style.maxWidth = sideNav.scrollHeight + "vh"
  }
})

close.addEventListener('click', CloseSideNav = ()=> {
  sideNav.style.maxWidth = null
})