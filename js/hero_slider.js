//hero slider js 
const slider = document.querySelector(".slider");
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");
const slides = document.querySelectorAll(".slide");
let index = 1;
console.log(slides)

// const interval = 4000;
const slide_width = slides[0].clientWidth;
console.log(next)
console.log(prev)

// start with slide 1
slider.style.transform = `translate(${-slide_width}px)`;

// const slide_show = ()=>{
//     index++;
//     slider.style.transition = "all 0.3s ease";
//     slider.style.transform = `translate(${-slide_width * index}px)`;
// }
// setInterval(()=>{
//     slide_show();
// },interval);

next.addEventListener("click",()=>{
    index++;
    slider.style.transition = "0.3s";
    slider.style.transform = `translate(${-slide_width * index}px)`;
});
prev.addEventListener("click",()=>{
    index--;
    slider.style.transition = "0.3s";
    slider.style.transform = `translate(${-slide_width * index}px)`;
});
slider.addEventListener("transitionend",()=>{
    if(slides[index].classList.contains("first-slide")){
        index = slides.length - 2;
        slider.style.transition = "none";
        slider.style.transform = `translate(${-slide_width * index}px)`;

    }
    if(slides[index].classList.contains("last-slide")){
        index = slides.length - index;
        slider.style.transition = "none";
        slider.style.transform = `translate(${-slide_width * index}px)`;
    }
    // console.log("ok")
});
// hero slider js end