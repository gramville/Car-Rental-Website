<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="employee1.css">
</head>
<body>
<h1>Mekina <span>.Com</span></h1>
<nav>

    <li>Car</li>
    <li style="display:none">Driver</li>
    <li>Employee</li>
    <li>Me</li>
    <li><a href="first.php">Log out</a></li>
    </nav>
    
    <section class="registerCar">
    <h1>Register a Car</h1>
    <form action="connection1.php" method="post" >
        <div class="input-field"><span>Employee Id:</span><input type="text" readonly name="employeeId"><br></div>
        <div class="input-field"><span>Model number:</span><input type="text" placeholder="" name="modelNumber"> <br></div>
        <div class="input-field"><span>Manufacture date:</span><input type="text" placeholder="" name="manufactureDate"> <br></div>
        <div class="input-field" id="image"><span>Image:</span></div><input type="file" value="Browse" name="image" accept="/image*" class="carImg"><br>
        <div class="input-field" id="plateNumber"><span>Plate number</span><input type="text" placeholder="" name="plateNumber"> <br></div>
        <div class="input-field"><input type="submit" value="Register"name="submitNewCar"></div>
        

        



    </form>
    <br>
    <div class="c1">Return rent:<input type="checkbox" ></div>
    <div class="c2">Modify cars: <input type="checkbox" ></div>
    <div class="carReturn">
    
    <form action="connection1.php" method="post" class="returnCars">
        
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
      echo "connection error";
    }

    // initializing prameter for stored procedures
    
    // calling view rented cars procedure 
    ?>
    <table class="modifyTable" border=1>
        <thead>
            <th>Car ID</th>
            <th>Model</th>
            <th>Manufacture Date</th>
            <th>Plate Number</th>
            <th>Customer ID</th>
        </thead>
        
            
        
        
    
    <?php
    if($result=mysqli_query ($MyConnection,"call viewRentedCars()")){
        while($row=mysqli_fetch_array($result)){
        $user=$row;
        
?>
    <tr border=1>
        <td><?php echo $user[0]; ?></td>
        <td><?php echo $user[1]; ?></td>
        <td><?php echo $user[2]; ?></td>
        <td><?php echo $user[5]; ?></td>
        <td><?php echo $user[7]; ?></td>
    </tr>
    
<?php
        }
        
    }
    


    ?>
    </table>

    
    
    </form>
    <form action="connection1.php" method="post">
    <div class="input-field" id="retId"><span>Car Id: </span><input type="text" required class="carReturnId" name="carReturnId"> <br></div>
    <div class="input-field" id="retId"><input type="submit" name="returnRentedCar" value="Return Car"></div>
    </form>
    </div>
    
<!--///////////////////////end of view rented cars//////////////////////////////////////////////////////////////////////////////////////////////////////////////////      -->

<div class="editCars">
<form action="connection1.php" method="post">

<table border=1>
        <thead border=1>
            <th>Car ID</th>
            <th>Model</th>
            <th>Manufacture Date</th>
            <th>Picture</th>
            <th>Available</th>
            <th>Plate Number</th>
            <th>Driver ID</th>
            <th>Customer ID</th>
            <th>Employee ID</th>
        </thead>
        <?php
        if($result=mysqli_query($MyConnection,"call viewCar()")){
            while($user=mysqli_fetch_array($result)){
                ?>
                <tr border=12>
                    <td><?php echo $user[0]; ?></td>
                    <td><?php echo $user[1]; ?></td>
                    <td><?php echo $user[2]; ?></td>
                    <td><?php echo $user[3]; ?></td>
                    <td><?php echo $user[4]; ?></td>
                    <td><?php echo $user[5]; ?></td>
                    <td><?php echo $user[6]; ?></td>
                    <td><?php echo $user[7]; ?></td>
                    <td><?php echo $user[8]; ?></td>
                    
                </tr>
                
            <?php

            }
        }
        ?>

</table>

<input type="text">

</form>
    <!--//////////////////////////////// end of view all cars////////////////////////////////////////////////////////////////-->





</div>
    </section>

    <section class="registerEmployee">
    <h1>Register Employee</h1>
    <form action="connection1.php" method="post" >
        <div class="input-field"><span>Employee Id:</span><input type="text" readonly name="employeeId"><br></div>
        <div class="input-field"><span>First name:</span><input type="text" name="fName" placeholder=""> <br></div>
        <div class="input-field"><span>Middle name:</span><input type="text" name="mName" placeholder=""> <br></div>
        <div class="input-field"><span>Last name:</span><input type="text" name="lName" placeholder=""> <br></div>
        <div class="input-field"><span>Phone:</span><input type="text" name="phone" placeholder=""> <br></div>
        <div class="input-field"><span>Email address:</span><input type="text" name="email" placeholder=""> <br></div>
        <div class="input-field"><span>Password:</span><input type="password" name="password" minlength="8" placeholder=""> <br></div>
        <div class="input-field"><span>Salary:</span><input type="text" placeholder="" name="salary"><br></div>
        <div class="input-field" id="submitEmployee"><input type="submit" name="submitNewEmployee"><br></div>
    </form>
    </section>
    <section class="registerDriver">
        <h1>Register Driver</h1>
    <form action="connection1.php" method="post" >
        <div class="input-field"><span>Employee Id:</span><input type="text" readonly name="employeeId"><br></div>
        <div class="input-field"><span>First name:</span><input type="text" name="fName" placeholder=""> <br></div>
        <div class="input-field"><span>Middle name</span><input type="text" name="mName" placeholder=""> <br></div>
        <div class="input-field"><span>Last name</span><input type="text" name="lName" placeholder=""> <br></div>
        <div class="input-field"><span>Phone</span><input type="text" name="phone" placeholder=""> <br></div>
        <div class="input-field"><span>Email address</span><input type="text" name="email" placeholder=""> <br></div>
        <div class="input-field"><span>Salary</span><input type="text" placeholder="" name="salary"><br></div>
        <div class="input-field" id="submitDriver"><input type="submit" name="submitNewDriver"><br></div>
    </form>
    </section>
    <section class="employeeEdit">
    <form action="connection1.php" method="post" >
    <div class="input-field"><span>Id:</span><input type="text" readonly name="employeeId"><br></div>
    <div class="input-field"><span>First name:</span><input type="text" required name="employeeEditFname"><br></div>
    <div class="input-field"><span>Middle name:</span><input type="text" required name="employeeEditMname"><br></div>
    <div class="input-field"><span>Last name:</span><input type="text" required name="employeeEditLName"><br></div>
    <div class="input-field"><span>Phone:</span><input type="text" required name="employeeEditPhone"> <br></div>
    <div class="input-field"><span>Email:</span> <input type="text" required name="employeeEditEmail"> <br></div>
    <div class="input-field"><span>Password:</span><input type="text" required name="employeeEditPassword"><br></div>
    <div class="input-field"><span>Salary</span><input type="text" readonly><br></div>
    <div class="input-field"><input type="submit" name="EmployeeEditSubmit" value="Edit"></div>
    <p>You need to log in again after any modification!!!!</p>
</form>
    </section>
    <?php
    ?>
    
</body>
<script src="employee.js"></script>
</html>