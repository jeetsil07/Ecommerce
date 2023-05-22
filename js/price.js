const quantity = document.querySelectorAll(".quantity-val");
const pos = document.querySelectorAll(".pos");
const neg = document.querySelectorAll(".neg");
// console.log(quantity)
// console.log(pos)
// console.log(neg)

for(let i=0;i<pos.length;i++){
    pos[i].addEventListener("click",()=>{
        let val = Number(quantity[i].getAttribute("value"));
        val +=1;
        quantity[i].setAttribute("value",val);
        console.log(val)
    });
}
for(let i=0;i<neg.length;i++){
    neg[i].addEventListener("click",()=>{
        let val = Number(quantity[i].getAttribute("value"));
        if(val !=1 ){
            val -=1;
        }
        quantity[i].setAttribute("value",val);
        console.log(val)
    });
}