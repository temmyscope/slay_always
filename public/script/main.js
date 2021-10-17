// handle navigation links on mobile
// const hamburgerMenu = document.querySelector('.menu-icon')
// const nav = document.querySelector('nav')
// const header = document.querySelector('header')

// hamburgerMenu.addEventListener("click", showMenu=()=> {
//   hamburgerMenu.classList.toggle("close");
//   if (nav.style.display) {
//     nav.style.display = null;
//   } else {
//     nav.style.display = `flex`
//   }
// })
// close navigation links once the body is clicked
// document.body.addEventListener("click", function (e) {
//   if (!e.path.includes(header)) {
//     nav.style.display = null
//     hamburgerMenu.classList.remove("close");
//   }
// })

// onclick="plusSlides(-1)"
// manual slide show
// const minus = document.querySelector('#minus')
// const add = document.querySelector('#add')
// minus.addEventListener('click', ()=> {
//   plusSlides(-1)
// })
// add.addEventListener('click', ()=> {
//   plusSlides(1)
// })

// let slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.querySelectorAll("#slides");
//   if (n > slides.length) {
//     slideIndex = 1
//   }    
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//       slides[i].style.display = "none";  
//   }
//   slides[slideIndex-1].style.display = "block"; 
// }
// automatic slide show
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

// dropdown
// const dropDown = document.querySelector('#drop-down')
// const dropDownContent = document.querySelector('#content')

// dropDown.addEventListener('click', ()=> {
//   if (dropDownContent.style.display) {
//     dropDownContent.style.display = null
//   } else {
//     dropDownContent.style.display = `block`
//   }
// })

// dropDownContent.onmouseleave = function (e) {
//   e.dropDownContent
//   dropDownContent.style.display = null
// }

// accordion

var acc = document.querySelectorAll(".accord");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display) {
      panel.style.display = `block`;
    } else {
      panel.style.display = `none`;
    } 
  });
}


// var slide = 1;
// showImageSlides(slide);

// function plusSlides(n) {
//   showImageSlides(slide += n);
// }

// function currentSlide(n) {
//   showImageSlides(slide = n);
// }

// function showImageSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlidex");
//   var dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slide = 1}    
//   if (n < 1) {slide = slides.length}
//   for (i = 0; i < slides.length; i++) {
//       slides[i].style.display = "none";  
//   }
//   for (i = 0; i < dots.length; i++) {
//       dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slide-1].style.display = "block";  
//   dots[slide-1].className += " active";
// }

// const radio = document.querySelector('#slide1')

// if (radio.checked) {
  
// }

// footer accordion
const accordion = document.querySelectorAll(".footer-accordion");
var i;

for (i = 0; i < accordion.length; i++) {
  accordion[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling; 
    panel.style.maxHeight ? panel.style.maxHeight = null : panel.style.maxHeight = panel.scrollHeight + "px";
  });
}

