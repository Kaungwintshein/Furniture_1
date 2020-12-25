const slider = document.querySelector(".slider");
const leftArrow = document.querySelector(".left");
const rightArrow = document.querySelector(".right");

let slideIndex = 0;

rightArrow.addEventListener("click", function () {
  slideIndex = slideIndex < 2 ? slideIndex + 1 : 2;
  slider.style.transform = "translate(" + slideIndex * -33.4 + "%)";
});
leftArrow.addEventListener("click", function () {
  slideIndex = slideIndex > 0 ? slideIndex - 1 : 0;
  slider.style.transform = "translate(" + slideIndex * -33.4 + "%)";
});
