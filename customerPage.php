
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="custpage.css">
</head>
<body>
<h1>Mekina <span>.Com</span></h1>
<nav>

    <li><a href="customerPage.php">Home</a></li>
    <li class="user"><p>Welcome <a href="custpage.css">User</a></p></li>
    <li><a href="userHistory.php">History</a></li>
    <li><a href="first.php">Log out</a></li>
    </nav>
   <section>
   <img class="firstimage" src="carPictures/board1.jpg" alt=""> <br>
    <h2>Available Cars</h2>
    <?php
    $servername = "localhost";
    $username = "webproject";
    $password = "webprojectpassword";
    $db="car_rental";
    ?>

    <!-- <section>
        <p>Model:</p>
        <p>manufacture Date:</p>
        <p>Plate Number:</p>
        <select name="" id=""></select>
        Start Date: <input type="date"> <br>
        End Date: <input type="date"> <br>
        <p>Fare:</p>
        <p>Total Amount</p>
    </section> -->

<div class="availablecars" style="display:flex; flex-wrap: wrap; justify-: center; align-items: center;">
    <?php
    
    // Create connection
    $MyConnection = new mysqli($servername, $username, $password,$db);
    
    // Check connection
    if ($MyConnection->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $index=0;
    if($result=mysqli_query($MyConnection,"call viewAvailableCars()")){
        while($row=mysqli_fetch_array($result)){
          $user=$row;
          echo "<div class='imagesfromfile' style=' background-color:transparent; width: 30%;'>
          <p>Id:$user[0]<br> Model:$user[1]<br> ManufactureDate:$user[2]<br> PlateNumber:$user[5]
          </p>
          <img src='carPictures/$user[3]' >

          </div>";
        }

    

    
}
    if($result1=mysqli_query($MyConnection,"call availableDrivers()")){
        echo "<h1>inside first if</h1>";
        while($row1=mysqli_fetch_array($result1)){
          $driver=$row1;
          }
          setcookie("drivers",$driver);
    }
    else{
        "<h1>outside first if</h1>";

    }
        


    ?>
    </div>
   </section>
     

</body>
<script src="jquery_uncompressed.js"></script>
<script src="jquery.datetimepicker.js"></script>
<script src="customerPage.js"></script>
</html>