let sent=sessionStorage.getItem("indexes");
data=[];
count=0;
sent=sent.split(".,.");
    for(i=0;i<sent.length;i++){
        if(i%2==0){
            data[count]=sent[i];
            count++;
        }
    }
console.log(data);
let navigation=document.querySelectorAll("nav li");
navigation[3].textContent=`Welcome ${data[1]}`;
document.cookie=`employeeId=${data[0]}`
let ids=document.querySelectorAll("form .input-field:first-child input");
console.log(ids);
console.log(ids);
for(i=0;i<ids.length;i++){
    if(ids[i].className!="carReturnId")
    ids[i].value=data[0];
    ;
}
let car=document.querySelector(".registerCar");
let driver=document.querySelector(".registerDriver");
let emp=document.querySelector(".registerEmployee");
let me=document.querySelector(".employeeEdit");
navigation[0].addEventListener("click",()=>{
    driver.style.display="none";
    emp.style.display="none";
    car.style.display="block";
    me.style.display="none";
})
navigation[1].addEventListener("click",()=>{
    driver.style.display="block";
    emp.style.display="none";
    car.style.display="none";
    me.style.display="none";
})
navigation[2].addEventListener("click",()=>{
    emp.style.display="block";
    car.style.display="none";
    driver.style.display="none";
    me.style.display="none";
})
navigation[3].addEventListener("click",()=>{
    emp.style.display="none";
    car.style.display="none";
    driver.style.display="none";
    me.style.display="block";
})
let employeeFields=document.querySelectorAll("section.employeeEdit input");
console.log(employeeFields);
for(i=0;i<employeeFields.length-1;i++){
    employeeFields[i].value=data[i];
}
checkbox=document.querySelectorAll("input[type='checkbox']");
console.log(checkbox);
let returnRent=document.querySelector(".carReturn");
let editCars=document.querySelector(".editCars");
checkbox[0].addEventListener("click",()=>{
    
    if(checkbox[0].checked){
        returnRent.style.display="inline";
    }
    else{
        returnRent.style.display="none";
        console.log("fbjhgbnbvnjh");
        
    }
})
checkbox[1].addEventListener("click",()=>{
    console.log("jhgjkjh");
    if(checkbox[0].checked){
        editCars.style.clear="none";
        if(checkbox[1].checked){
        editCars.style.display="inline";
    }
    else{
        editCars.style.display="none";
    }
    }
    else{
        editCars.style.clear="both";
        if(checkbox[1].checked){
            editCars.style.display="inline";
        }
        else{
            editCars.style.display="none";
        }
    }
})
h1=document.querySelector("h1");
h1.addEventListener("click",()=>{
    window.open("first.php","_self");
})

