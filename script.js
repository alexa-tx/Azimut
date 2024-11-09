let slideIndex = 0;
const slides = document.querySelectorAll(".slide");
const totalSlides = slides.length;

function showSlides() {
    slides.forEach((slide, index) => {
        slide.style.opacity = "0"; 
    });
    
    slideIndex = (slideIndex + 1) % totalSlides; 
    slides[slideIndex].style.opacity = "1";
}

setInterval(showSlides, 3000); 
