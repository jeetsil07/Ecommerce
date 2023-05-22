//header js
const category = document.querySelector("#category");
const plus = document.querySelector("#category i");
const categorydetails = document.querySelector(".category-details");
// console.log(category)
// console.log(categorydetails)
// console.log(plus)

category.addEventListener("click",(e)=>{
    // e.preventDefault()
    categorydetails.classList.toggle("display");
    if(plus.classList.contains("fa-plus")){
        plus.classList.remove("fa-plus");
        plus.classList.add("fa-minus");
    }else{
        plus.classList.remove("fa-minus");
        plus.classList.add("fa-plus");
    }
})
//header js end
