// product details start
const mainimg = document.querySelector(".product-image img");
const images = document.querySelectorAll(".product-images img");
var srcval;
// console.log(images);
images.forEach(image => {
    image.addEventListener("click",()=>{
        images.forEach(image=>{
            image.style.transform="scale(1)";
        });
        image.style.transform="scale(1.2)";
        srcval = image.getAttribute("src");
        mainimg.setAttribute("src",srcval);
        
    }) 
});
// product details end