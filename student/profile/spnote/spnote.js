let private = document.querySelector(".private");
let public = document.querySelector(".public");
let slider = document.querySelector(".slider");
let formSection = document.querySelector(".form-sec");
 
public.addEventListener("click", () => {
    slider.classList.add("moveslider");
    formSection.classList.add("form-sec-move");
});
 
private.addEventListener("click", () => {
    slider.classList.remove("moveslider");
    formSection.classList.remove("form-sec-move");
});