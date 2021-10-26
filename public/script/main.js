// const { x } = require("joi");

let slideTextIndex = 0;

function showSlides() {
let textSlides = document.querySelectorAll("#slides");
for (let i = 0; i < textSlides.length; i++) {
  textSlides[i].style.display = "none";
  // slides[i].style.display = `translate`  
}
slideTextIndex++;
if (slideTextIndex > textSlides.length) {
  slideTextIndex = 1
}    
textSlides[slideTextIndex-1].style.display = "block";  
setTimeout(showSlides, 2000); // Change image every 2 seconds
}
showSlides();


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
// let navDisplay = document.querySelector('#filtered')
// const sideNav = document.querySelector('.side-nav')
// const close = document.querySelector('.close')


// navDisplay.addEventListener("click", showSideNav =()=>{
//   if (sideNav.style.maxWidth) {
//     sideNav.style.maxWidth = "none"
//   } else {
//     sideNav.style.maxWidth = sideNav.scrollHeight + "vh"
//   }
// })

// close.addEventListener('click', CloseSideNav = ()=> {
//   sideNav.style.maxWidth = "none"
// })


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

// active image
let imagesHeader = document.querySelector("#imagesHeader");
const imagesBtns = imagesHeader.querySelectorAll(".image-btn");
  imagesBtns.forEach(imagesBtn => {
    imagesBtn.addEventListener("click", function() {
      const current = document.querySelectorAll(".active-images");
      if (current.length > 0) {
        current[0].className = current[0].className.replace(" active-images", "");
      }
      this.className += " active-images";
    })
  })

// image slide for product page
  var imageSlide = 1;
showImages(imageSlide);

function plusImages(image) {
  showImages(imageSlide += image);
}

function currentImage(image) {
  showImages(imageSlide = image);
}

function showImages(image) {
  var slides = document.querySelectorAll(".imagex");
  if (image > slides.length) {imageSlide = 1}    
  if (image < 1) {imageSlide = slides.length}
  for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[imageSlide-1].style.display = "block";  
}

// toggle like
function toggleHeart(likeIcon) {
  likeIcon.classList.toggle("heart")
}

// counter
// let like = document.querySelector('#likeCounter')
// let cart = document.querySelector('#counters')
// let counter = 0

// like.addEventListener("click", function() {
//   counter ++
//   cart.innerHTML = counter
// })
