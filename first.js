let images=document.querySelectorAll("img");
for(i=1;i<images.length;i++){
    images[i].addEventListener("click",()=>{
        window.open('index.php',"_self");
    })
}
