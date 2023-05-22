const my_order_btn = document.querySelector(".my-order-btn");
const update_btn = document.querySelector(".user-update-btn");
const my_order_table = document.querySelector(".my-order-table");
const update_form = document.querySelector(".registration");

// console.log(op_btns)

update_btn.addEventListener("click",()=>{
    my_order_btn.classList.remove("active");
    update_btn.classList.add("active");
    update_form.classList.remove("d-none");
    update_form.classList.add("d-block");
    my_order_table.classList.add("d-none");
});
my_order_btn.addEventListener("click",()=>{
    my_order_btn.classList.add("active");
    update_btn.classList.remove("active");
    my_order_table.classList.remove("d-none");
    my_order_table.classList.add("d-block");
    update_form.classList.add("d-none");
});