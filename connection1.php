
<?php
$servername = "localhost";
$username = "webproject";
$password = "webprojectpassword";
$db="car_rental";

// Create connection
$MyConnection = new mysqli($servername, $username, $password,$db);

// Check connection
if ($MyConnection->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// registering a new customer

if(isset($_POST["registerCustomer"])){
$fname=$_POST["fName"];
$mname=$_POST["mName"];
$lname=$_POST["lName"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$password=$_POST["password"];
// setting pARameters and callng sp
mysqli_query($MyConnection ,"SET @p0='".$fname."'");
mysqli_query($MyConnection ,"SET @p1='".$mname."'");
mysqli_query($MyConnection ,"SET @p2='".$lname."'");
mysqli_query($MyConnection ,"SET @p3='".$phone."'");
mysqli_query($MyConnection ,"SET @p4='".$email."'");
mysqli_query($MyConnection ,"SET @p5='".$password."'");
mysqli_multi_query ($MyConnection,"call insertCustomer(@p0,@p1,@p2,@p3,@p4,@p5)") OR DIE (mysqli_error($MyConnection));
header('Location: '.'index.php');

}

// checking validity of customer login
if(isset($_POST["customerLoginSubmit"])){
  $id=$_POST["username"];
  $password=$_POST["password"];
  mysqli_query($MyConnection ,"SET @p0='".$id."'");
  mysqli_query($MyConnection ,"SET @p1='".$password."'");
  if($result=mysqli_query($MyConnection,"call checkCustomer(@p0,@p1)")){
    while($row=mysqli_fetch_array($result)){
      $user=$row;
    }
    if( isset($user)){
      ?>
      <script>
        <?php 
        $data=join(".,.",$user);
        echo "var data='$data';";
         ?>
        sessionStorage.setItem('indexes',data);
        window.open('customerPage.php',"_self")
      </script>
      <?php
    
    }
    else{
      //index.php customer login
      header('Location: '.'index.php');
      }
      //header('Location: '.'Login.php');
    }

}

// registering a rent
if(isset($_POST["submitRent"])){
  $sdate=$_POST["rentStartDate"];
  $edate=$_POST["rentEndDate"];
  $f=$_POST["rentFare"];
  $fare=explode(": ",$f);
  $t=$_POST["rentTotalAmount"];
  $totalamount=explode(": ",$t);
  $custid=$_POST["rentCustomerId"];
  $customerid=explode(": ",$custid);
  $driverid=0;// select not working if it works$driverid=$_POST[""]
  $carident=$_POST["carRentId"];
  $carid=explode(": ",$carident);
  
// begining to call insertRent stored procedure
mysqli_query($MyConnection ,"SET @p0='".$sdate."'");
mysqli_query($MyConnection ,"SET @p1='".$edate."'");
mysqli_query($MyConnection ,"SET @p2='".$fare[1]."'");
mysqli_query($MyConnection ,"SET @p3='".$totalamount[1]."'");
mysqli_query($MyConnection ,"SET @p4='".$customerid[1]."'");
mysqli_query($MyConnection ,"SET @p5='".$driverid."'");
mysqli_query($MyConnection ,"SET @p6='".$carid[1]."'");
mysqli_multi_query ($MyConnection,"call insertNewRent(@p0,@p1,@p2,@p3,@p4,@p5,@p6)") OR DIE (mysqli_error($MyConnection));


//calling the rent stored procedure
mysqli_query($MyConnection ,"SET @p0='".$carid[1]."'");
mysqli_query($MyConnection ,"SET @p1='".$customerid[1]."'");
mysqli_multi_query ($MyConnection,"call rentCar(@p0,@p1)") OR DIE (mysqli_error($MyConnection));
header('Location: '.'customerPage.php');
}

// editing customer
if(isset($_POST["customerEditSubmit"]))
{
  $id=$_POST["customerEditId"];
  $fname=$_POST["customerEditFname"];
  $mname=$_POST["customerEditMname"];
  $lname=$_POST["customerEditLName"];
  $phone=$_POST["customerEditPhone"];
  $email=$_POST["customerEditEmail"];
  $password=$_POST["customerEditPassword"];

  // calling modify customer store procedure 
    
    
    mysqli_query($MyConnection ,"SET @p0='".$id."'");
    mysqli_query($MyConnection ,"SET @p1='".$fname."'");
    mysqli_query($MyConnection ,"SET @p2='".$mname."'");
    mysqli_query($MyConnection ,"SET @p3='".$lname."'");
    mysqli_query($MyConnection ,"SET @p4='".$phone."'");
    mysqli_query($MyConnection ,"SET @p5='".$email."'");
    mysqli_query($MyConnection ,"SET @p6='".$password."'");
    mysqli_multi_query ($MyConnection,"call updateCustomer(@p0,@p1,@p2,@p3,@p4,@p5,@p6)") OR DIE (mysqli_error($MyConnection));
    header('Location: '.'index.php');  
}

// employee login
if(isset($_POST["employeeLoginSubmit"])){

  $id=$_POST["employeeLoginId"];
  $password=$_POST["employeeLoginPassword"];
  mysqli_query($MyConnection ,"SET @p0='".$id."'");
  mysqli_query($MyConnection ,"SET @p1='".$password."'");
  if($result=mysqli_query($MyConnection,"call checkEmployee(@p0,@p1)")){
    while($row=mysqli_fetch_array($result)){
      $user=$row;
    }
    if( isset($user)){
      ?>
      <script>
        <?php 
        $data=join(".,.",$user);
        echo "var data='$data';";
         ?>
        sessionStorage.setItem('indexes',data);
        window.open('employee.php',"_self")
      </script>
      <?php
      
    }
    else{
      header('Location: '.'employeeLogin.php');
      }
      
    }

}

// registering a new car
if(isset($_POST["submitNewCar"])){
  $model=$_POST["modelNumber"];
  $mfd=$_POST["manufactureDate"];
  $pic=$_POST["image"];
  $platenum=$_POST["plateNumber"];
  $empid=$_POST["employeeId"];
//passing the parameters and calling the stored procedure
  mysqli_query($MyConnection ,"SET @p0='".$model."'");
mysqli_query($MyConnection ,"SET @p1='".$mfd."'");
mysqli_query($MyConnection ,"SET @p2='".$pic."'");
mysqli_query($MyConnection ,"SET @p3='".$platenum."'");
mysqli_query($MyConnection ,"SET @p4='".$empid."'");
mysqli_multi_query ($MyConnection,"call insertCar(@p0,@p1,@p2,@p3,@p4)");
header('Location: '.'employee.php');
  
}

// registering a new driver 
if(isset($_POST["submitNewDriver"])){
  $fname=$_POST["fName"];
  $mname=$_POST["mName"];
  $lname=$_POST["lName"];
  $phone=$_POST["phone"];
  $email=$_POST["email"];
  $salary=$_POST["salary"];
  $id=$_POST["employeeId"];
  // passing parameters and calling the insert driver stored procedure
  
  mysqli_query($MyConnection ,"SET @p0='".$fname."'");
  mysqli_query($MyConnection ,"SET @p1='".$mname."'");
  mysqli_query($MyConnection ,"SET @p2='".$lname."'");
  mysqli_query($MyConnection ,"SET @p3='".$phone."'");
  mysqli_query($MyConnection ,"SET @p4='".$email."'");
  mysqli_query($MyConnection ,"SET @p5='".$salary."'");
  mysqli_query($MyConnection ,"SET @p6='".$id."'");
  mysqli_multi_query ($MyConnection,"call insertDriver(@p0,@p1,@p2,@p3,@p4,@p5,@p6)") OR DIE (mysqli_error($MyConnection));
  header('Location: '.'employee.php');
}

// editing employee
if(isset($_POST["EmployeeEditSubmit"]))
{
  $id=$_POST["employeeId"];
  $fname=$_POST["employeeEditFname"];
  $mname=$_POST["employeeEditMname"];
  $lname=$_POST["employeeEditLname"];
  $phone=$_POST["employeeEditPhone"];
  $email=$_POST["employeeEditEmail"];
  $password=$_POST["employeeEditPassword"];

  // calling modify employee store procedure 
    
    
    mysqli_query($MyConnection ,"SET @p0='".$id."'");
    mysqli_query($MyConnection ,"SET @p1='".$fname."'");
    mysqli_query($MyConnection ,"SET @p2='".$mname."'");
    mysqli_query($MyConnection ,"SET @p3='".$lname."'");
    mysqli_query($MyConnection ,"SET @p4='".$phone."'");
    mysqli_query($MyConnection ,"SET @p5='".$email."'");
    mysqli_query($MyConnection ,"SET @p6='".$password."'");
    mysqli_multi_query ($MyConnection,"call updateEmployee(@p0,@p1,@p2,@p3,@p4,@p5,@p6)") OR DIE (mysqli_error($MyConnection));
    header('Location: '.'employee.php');  
}

// returning a rented car
if(isset($_POST["returnRentedCar"])){
  $id=$_POST["carReturnId"];

//setting parameters and calling stored procedures
mysqli_query($MyConnection ,"SET @p0='".$id."'");
mysqli_multi_query ($MyConnection,"call returnRentedCar(@p0)") OR DIE (mysqli_error($MyConnection));
header('Location: '.'employee.php');

}

?>