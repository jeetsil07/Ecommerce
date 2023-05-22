// login-popup js start
const login_popup = document.querySelector(".login-popup");
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_in_plus = document.querySelector("#sign-in-btn i");
// console.log(login_popup);
// login_popup.style.display="block";
// window.addEventListener("click",()=>{
//     login_popup.style.display="none";
// });
sign_in_btn.addEventListener("click",(e)=>{
    // console.log("click ok")
    // e.preventDefault()
    login_popup.classList.toggle("display");
    if(sign_in_plus.classList.contains("fa-plus")){
        sign_in_plus.classList.remove("fa-plus");
        sign_in_plus.classList.add("fa-minus");
    }else{
        sign_in_plus.classList.remove("fa-minus");
        sign_in_plus.classList.add("fa-plus");
    }
})
const user_btn = document.querySelector(".user-login-btn");
const admin_btn = document.querySelector(".admin-login-btn");
const user_login_cont = document.querySelector(".user-login-form-container");
const admin_login_cont = document.querySelector(".admin-login-form-container");
user_btn.addEventListener("click",()=>{
    user_btn.style.backgroundColor="var(--color1)";
    admin_btn.style.backgroundColor="var(--color3)";
    user_login_cont.style.display="block";
    admin_login_cont.style.display="none";
    // console.log("user")
});
admin_btn.addEventListener("click",()=>{
    user_btn.style.backgroundColor="var(--color3)";
    admin_btn.style.backgroundColor="var(--color1)";
    user_login_cont.style.display="none";
    admin_login_cont.style.display="block";
    // console.log("admin")
});
// login-popup js end

