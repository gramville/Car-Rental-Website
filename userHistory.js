sents=sessionStorage.getItem("indexes");
data=sents.split(",");
console.log(data);
// sending data to the other pages
sessionStorage.setItem("indexes",data);
document.cookie = `id=${data[0]}`;
let x = document.cookie;
let user=document.querySelector("li.user");
user.textContent=`welcome ${data[1]}`; 
user.innerHTML=`Welcome <a href='CustomerUser.php'>${data[1]}</a>`;






let logout=document.querySelector("nav li:last-child");
logout.addEventListener("click",()=>{
    window.open('first.php',"_self")
})


