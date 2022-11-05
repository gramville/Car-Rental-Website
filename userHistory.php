<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userHistory1.css">
</head>
<body>
<h1>Mekina <span>.Com</span></h1>
<nav>

    <li><a href="customerPage.php">Home</a></li>
    <li class="user"><p>Welcome <a href="custpage.css">User</a></p></li>
    <li><a href="userHistory.php">History</a></li>
    <li><a href="first.php">Log out</a></li>
    </nav>
    <br><br><br>
    <h2>Rent History</h2>
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

    // initializing prameter for stored procedures
    
    // calling view rent history procedure 
    ?>
    <table>
        <thead>
        <th>Rent ID</th>
            <th>Customer ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Fare</th>
            <th>Total Amount</th>
            <th>Customer ID</th>
            <th>Car ID</th>
        </thead>
        
            
        
        
    
    <?php
    $cook=$_COOKIE['id'];
     $id=explode("=",$cook);
   mysqli_query($MyConnection ,"SET @p0='".$id[0]."'");
    //$result=mysqli_multi_query ($MyConnection,"call viewCars()");
    if($result=mysqli_query ($MyConnection,"call viewRentHistory(@p0)")){
        while($row=mysqli_fetch_array($result)){
        $user=$row;
        
?>
    <tr>
        <td><?php echo $user[0]; ?></td>
        <td><?php echo $user[1]; ?></td>
        <td><?php echo $user[2]; ?></td>
        <td><?php echo $user[3]; ?></td>
        <td><?php echo $user[4]; ?></td>
        <td><?php echo $user[5]; ?></td>
        <td><?php echo $user[6]; ?></td>
        <td><?php echo $user[7]; ?></td>
    </tr>
    
<?php
        }
        
    }
    else{
        echo("<p>You have no rent history</p>");
    }
    


    ?>
    </table>
     
     
</body>
<script src="userHistory.js"></script>
</html>