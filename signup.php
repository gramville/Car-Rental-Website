<?php
 $fName=$_POST["firstname"];
 $mName=$_POST["middlename"];
 $lName=$_POST["lastname"];
 $phone=$_POST["phone"];
 $email=$_POST["email"];
 $password=$_POST["password"];
 $cCard=$_POST["creditcard"];






$servername = "localhost";
$username = "webproject";
$password = "webprojectpassword";
$database="car_rental";
// Create connection
$conn =mysqli_connect($servername, $username, $password,);

// Check connection
if ($conn){
echo "Connected successfully";
 $query="call insertCustomer($fName,$mName,$lName,$phone,$email,$password,$cCard);";
 $result=mysqli_query($conn, $query ); 
 echo $result;
}
else{
  echo "didn't connect";
 
}

 


?>