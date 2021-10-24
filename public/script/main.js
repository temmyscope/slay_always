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

// accordion for the side nav on shoes page
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
let filter = document.querySelector('#filtered')
const sideNav = document.querySelector('.side-nav')
const close = document.querySelector('.close')


// filter.addEventListener("click", showSideNav =()=>{
//   if (sideNav.style.maxWidth) {
//     sideNav.style.maxWidth = "none"
//   } else {
//     sideNav.style.maxWidth = sideNav.scrollHeight + "vh"
//   }
// })

// close.addEventListener('click', CloseSideNav = ()=> {
//   sideNav.style.maxWidth = "none"
// })


// const image = document.querySelector('#images')
// image.onmouseover = () => {

// }
// function changeImage(image) {
//   image.src = "../assets/edited1.PNG"
// }
// function returnImage(image) {
//   image.src = "../assets/slide4.PNG"
// }


// modal for size guide
const modal = document.querySelector("#myModal");
const openModal = document.querySelector("#openModal");
const closeModal = document.querySelector("#close-modal");

openModal.onclick = function() {
  modal.style.display = "flex";
}
closeModal.onclick = function() {
  modal.style.display = "none";
}

document.body.onclick = function(e) {
  e.target === modal ? modal.style.display = "none" : ''
}

// product accordion

const product = document.querySelector('.product')

product.addEventListener('click', function(){
  this.classList.toggle("prod");
  let productDetails = this.nextElementSibling;
  productDetails.style.display === 'none' ? productDetails.style.display = 'block' : productDetails.style.display = 'none'
})

const shippings = document.querySelectorAll(".shipping")

shippings.forEach(shipping => {
  shipping.addEventListener('click', function(){
    this.classList.toggle("shipping-active");
    let shippingDetails = this.nextElementSibling;
    shippingDetails.style.display === 'block' ? shippingDetails.style.display = 'none' : shippingDetails.style.display = 'block'
  })
});

// function fillHeart(heart) {
//   heart.classList.toggle(" fa-heart")
// }