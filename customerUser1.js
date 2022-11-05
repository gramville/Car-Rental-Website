let sent=sessionStorage.getItem("indexes");
data=sent.split(",");
console.log(data);
// sending data to the other pages
sessionStorage.setItem("indexes",data);

let input=document.querySelectorAll("input");
for(i=0;i<data.length;i++){
    input[i].value=data[i];
}
let user=document.querySelector("li.user");
user.textContent=`welcome ${data[1]}`; 
user.innerHTML=`Welcome <a href='CustomerUser.php'>${data[1]}</a>`;
console.log(data[1]);


let logout=document.querySelector("nav li:last-child");
logout.addEventListener("click",()=>{
    window.open('first.php',"_self")
})
console.log("blooooorb");