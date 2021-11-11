let slideTextIndex = 0;

function showTextSlides() {
  let textSlides = document.querySelectorAll("#slides");
  for (let firstText = 0; firstText < textSlides.length; firstText++) {
    textSlides[firstText].style.display = "none";
  }
  slideTextIndex++;
  if (slideTextIndex > textSlides.length) {
    slideTextIndex = 1
  }    
  textSlides[slideTextIndex-1].style.display = "block";  
  setTimeout(showTextSlides, 4500); // Change image every 4.5 seconds
}
showTextSlides();

// accordion for the side nav on shoes page
const sideNavAccordions = document.querySelectorAll(".accord");
if (sideNavAccordions) {
  for (let sideAccordion = 0; sideAccordion < sideNavAccordions.length; sideAccordion++) {
    sideNavAccordions[sideAccordion].addEventListener("click", function(){
      this.classList.toggle("chev");
      let sidePanel = this.nextElementSibling;
      sidePanel.style.display === `none` ? sidePanel.style.display = `block` : sidePanel.style.display = `none`;
    })
  }
}

  // active image
  let imagesHeader = document.querySelector("#imagesHeader");
  if (imagesHeader) {
    const imagesBtns = imagesHeader.querySelectorAll(".image-btn");
    imagesBtns.forEach(imagesBtn => {
      imagesBtn.addEventListener("click", function() {
        const current = document.querySelectorAll(".active-images");
        if (current.length > 0) {
          current[0].className = current[0].className.replace(" active-images", "");
        }
        this.className += " active-images";
      })
    });
  }

  // modal for size guide
  const modal = document.querySelector("#myModal");
  let openModal = document.querySelector("#openModal");
  const closeModal = document.querySelector("#close-modal");

  if (openModal) {
    openModal.onclick = function() {
      modal.style.display = "flex";
    }
  }
  
  if (closeModal) {
    closeModal.onclick = function() {
      modal.style.display = "none";
    }
  }

  document.body.onclick = function(e) {
    e.target === modal ? modal.style.display = "none" : ''
  }

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
    if (slides[imageSlide-1]) {
      slides[imageSlide-1].style.display = "block";
    }
  }

  // footer accordion
  const accordions = document.querySelectorAll(".footer-accordion");

  for (let accordion = 0; accordion < accordions.length; accordion++) {
    accordions[accordion].addEventListener('click', function(){
      this.classList.toggle('active');
      let panel = this.nextElementSibling;
      panel.style.maxHeight ? panel.style.maxHeight = null : panel.style.maxHeight = panel.scrollHeight + "px";
    });
  }


