    let slideTextIndex = 0;

    function showTextSlides() {
      let textSlides = document.querySelectorAll("#slides");
      if (textSlides) {
        for (let firstText = 0; firstText < textSlides.length; firstText++) {
          textSlides[firstText].style.display = "none";
        }
        slideTextIndex++;
        if (slideTextIndex > textSlides.length) {
          slideTextIndex = 1
        }
        if ( textSlides[slideTextIndex-1] ) {
          textSlides[slideTextIndex-1].style.display = "block";  
        }
        setTimeout(showTextSlides, 4500); // Change image every 4.5 seconds
      }
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

    // show sideNav
    let displaySideNav = document.getElementById('filtered');
    let sideNav = document.querySelector('.side-nav');
    let close = document.querySelector('.close');
    if(displaySideNav && sideNav){
        displaySideNav.addEventListener('click', function(){
            if (sideNav.style.display === "block") {
              sideNav.style.display = "none";
            } else {
              sideNav.style.display = "block";
            }
        });
    }
    if(close){
        close.addEventListener('click', () => {
            sideNav.style.display = "none";
        });
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
    const product = document.querySelector('.product');
    if(product){
        product.addEventListener('click', function(){
            this.classList.toggle("prod");
            let productDetails = this.nextElementSibling;
            if(productDetails){
                productDetails.style.display === 'none' ? productDetails.style.display = 'block' : productDetails.style.display = 'none';
            }
        });
    }

    const shippings = document.querySelectorAll(".shipping");
    if(shippings){
        shippings.forEach(shipping => {
          shipping.addEventListener('click', function(){
            this.classList.toggle("shipping-active");
            let shippingDetails = this.nextElementSibling;
            shippingDetails.style.display === 'block' ? shippingDetails.style.display = 'none' : shippingDetails.style.display = 'block'
          })
        });
    }