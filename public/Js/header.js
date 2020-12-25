//Nav
let navIcon = document.querySelector(".navbar-icon");
let navContainer = document.querySelector(".nav-container");

navIcon.addEventListener("click", () => {
  navContainer.classList.toggle("active");
});

//Background Image Slider

let slides = document.querySelectorAll(".Slide");
const buttons = document.querySelectorAll(".buttons button");
const buttonContainer = document.querySelector(".buttons");

let auto = true;
let intervalIime = 8000;
let slideInterval;

let nextSlide = () => {
  let currentSlider = document.querySelector(".Current");
  currentSlider.classList.remove("Current");
  let currentBtn = document.querySelector(".current");
  currentBtn.classList.remove("current");

  if (currentSlider.nextElementSibling && currentBtn.nextElementSibling) {
    currentSlider.nextElementSibling.classList.add("Current");
    currentBtn.nextElementSibling.classList.add("current");
  } else {
    slides[0].classList.add("Current");
    buttons[0].classList.add("current");
  }
  setTimeout(() => {
    currentSlider.classList.remove("Current");
    currentBtn.classList.remove("current");
  });
};

buttonContainer.addEventListener("click", (e) => {
  let currentSlider = document.querySelector(".Current");
  currentSlider.classList.remove("Current");
  let current = document.querySelector(".current");
  current.classList.remove("current");
  if (auto) {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, intervalIime);
  }
  if (!e.target.classList.contains("current")) {
    e.target.classList.add("current");
  }
  if (e.target.id === "prev") {
    slides[0].classList.add("Current");
  }
  if (e.target.id === "middle") {
    slides[1].classList.add("Current");
  }
  if (e.target.id === "next") {
    slides[2].classList.add("Current");
  }
});

if (auto) {
  slideInterval = setInterval(nextSlide, intervalIime);
}
