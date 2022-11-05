let sent=sessionStorage.getItem("indexes");
console.log(sent);
var data=[];
var count=0;
if(sent.includes(".,.")){
    sent=sent.split(".,.");
    for(i=0;i<sent.length;i++){
        if(i%2==0){
            data[count]=sent[i];
            count++;
        }
    }
}
else{
    data=sent.split(",");
}
// sending data to the other pages
sessionStorage.setItem("indexes",data);
console.log(data);
let board=document.querySelector("img");
console.log(board);
number=0
h1=document.querySelector("h1");
h1.addEventListener("click",()=>{
    window.open("first.php","_self");
})
setInterval(()=>{
    if(number==0){
        board.setAttribute("src","carPictures/board1.jpg");
    }
    else if(number==1){
        board.setAttribute("src","carPictures/board2.jpg"); 
    }
    else if(number==2){
        board.setAttribute("src","carPictures/board3.jpg"); 
    }
    number++;
    if(number>2) number=0;
},3000);
console.log(data);


let user=document.querySelector("li.user");
//user.textContent=`welcome ${data[1]}`; 
user.innerHTML=`Welcome <a href='CustomerUser.php'>${data[1]}</a>`;

divDisplayed=false;
var xClicked;
var yClicked;
let images=document.querySelectorAll("img");
for(i=1;i<images.length;i++){
    images[i].addEventListener("click",function (e){
        xClicked=e.pageX;
        yClicked=e.pageY;
        if(!divDisplayed){
        div=document.createElement("form");
        div.className="rentInfoDiv";
        div.setAttribute("action","connection1.php");
        div.setAttribute("method","post");
        customerId=document.createElement("input");
        customerId.setAttribute("type","text");
        customerId.setAttribute("readonly","");
        customerId.setAttribute("name","rentCustomerId");
        id=document.createElement("input");
        id.setAttribute("name","carRentId");
        id.setAttribute("type","text");
        id.setAttribute("readonly","");
        model=document.createElement("p");
        mfd=document.createElement("p");
        mfd.className="mfd";
        model.className="model";
        platenum=document.createElement("p");
        platenum.className="pnum";
        drop=document.createElement("select");
        startDate=document.createElement("input");
        startDate.setAttribute("name","rentStartDate");
        startDate.setAttribute("required","");
        endDate=document.createElement("input");
        endDate.setAttribute("name","rentEndDate");
        endDate.setAttribute("required","");
        fare=document.createElement("input");
        fare.setAttribute("name","rentFare");
        fare.setAttribute("readonly","");
        totalAmount=document.createElement("input");
        totalAmount.setAttribute("name","rentTotalAmount");
        totalAmount.setAttribute("readonly","");
        submit=document.createElement("input");
        submit.className="submit";
        submit.setAttribute("type","submit");
        submit.setAttribute("name","submitRent")
        startDate.setAttribute("type","date");
        endDate.setAttribute("type","date");
    }
        startDate.className="startDate";
        endDate.className="endDate";
        p=this.previousElementSibling.textContent;
        console.log(p);
        text=p.split(":");
        console.log(text);
        m1=text[1].split(" ")[0];
        m2=text[2].split(" ")[0];
        m3=text[3].split(" ")[0];
        console.log(m1);
        m4=text[4].split("\n")[0];
        customerId.value=`Customer id: ${data[0]}`;
        id.value=`Car id: ${m1}`
        model.textContent=`Model: ${m2}`;
        mfd.textContent=`Manufacture Date: ${m3}`;
        platenum.textContent=`Plate Number: ${m4}`;
        fare.value="Fare: 500";
        totalAmount.value="Total amount: ";
        var date=new Date();
        year=date.getFullYear();
        month=date.getMonth()+1
        day=date.getDate();
        if(month<10) month='0'+ month.toString();
        if(day<10) day='0'+day.toString();
        mindate=year+'-'+month+'-'+day;
        startDate.setAttribute("min",mindate);
        endDate.setAttribute("min",mindate);
        endDate.addEventListener("change",()=>{
            d1=new Date(startDate.value);
            d2=new Date(endDate.value);
            rentDay=d2.getDate()-d1.getDate();
            rentDay=rentDay*500;
            totalAmount.value=`Total amount: ${rentDay}`;
        })
        
        
        if(!divDisplayed){
        div.style.position = "absolute";
        div.style.left = xClicked+'px';
        div.style.top =yClicked+'px';
        console.log(xClicked,yClicked);
        console.log(div);
        div.appendChild(customerId);
        div.appendChild(id);
        div.appendChild(model);
        div.appendChild(mfd);
        div.appendChild(platenum);
        div.appendChild(startDate);
        div.appendChild(endDate);
        div.appendChild(fare);
        div.appendChild(totalAmount); 
        div.appendChild(submit);
        document.body.appendChild(div);
        divDisplayed=true;
        div.style.display="block";
    }
    else{
        divDisplayed=false;
        div.style.display="none";
    }

    
    
        
        
    })

}


let cx=document.cookie;
console.log(cx);


let avaialableCars=document.querySelectorAll(".availablecars .imagesfromfile")
for(i=0;i<avaialableCars.length;i++){
    if(i%2==0){
        avaialableCars[0].style.display="block";
    }
}





  
        



        


