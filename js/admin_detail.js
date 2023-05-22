const all_product_table = document.querySelector(".all-product-table");
const all_user_table = document.querySelector(".all-user-table");
const modify_banner = document.querySelector(".modify-banner");
const registration = document.querySelector(".registration");

const product_btn = document.querySelector(".all-product-btn");
const user_data_btn= document.querySelector(".all-users-btn");
const modify_banner_btn= document.querySelector(".slide-modify-btn");
const update_admin_btn= document.querySelector(".admin-update-btn");
// console.log(all_product_table)
// console.log(all_user_table)
// console.log(modify_banner)
console.log(modify_banner)

product_btn.addEventListener("click",()=>{

    product_btn.classList.add("active");
    user_data_btn.classList.remove("active");
    modify_banner_btn.classList.remove("active");
    update_admin_btn.classList.remove("active");

    all_product_table.classList.remove("d-none");
    all_user_table.classList.add("d-none");
    modify_banner.classList.add("d-none");
    registration.classList.add("d-none");
});
user_data_btn.addEventListener("click",()=>{

    product_btn.classList.remove("active");
    user_data_btn.classList.add("active");
    modify_banner_btn.classList.remove("active");
    update_admin_btn.classList.remove("active");

    all_product_table.classList.add("d-none");
    all_user_table.classList.remove("d-none");
    modify_banner.classList.add("d-none");
    registration.classList.add("d-none");
});
modify_banner_btn.addEventListener("click",()=>{

    product_btn.classList.remove("active");
    user_data_btn.classList.remove("active");
    modify_banner_btn.classList.add("active");
    update_admin_btn.classList.remove("active");

    all_product_table.classList.add("d-none");
    all_user_table.classList.add("d-none");
    modify_banner.classList.remove("d-none");
    registration.classList.add("d-none");
});
update_admin_btn.addEventListener("click",()=>{

    product_btn.classList.remove("active");
    user_data_btn.classList.remove("active");
    modify_banner_btn.classList.remove("active");
    update_admin_btn.classList.add("active");

    all_product_table.classList.add("d-none");
    all_user_table.classList.add("d-none");
    modify_banner.classList.add("d-none");
    registration.classList.remove("d-none");
});