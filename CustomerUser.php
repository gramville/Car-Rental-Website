<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="customercss.css">
</head>
<body>
<h1>Mekina <span>.Com</span></h1>
<nav>

    <li><a href="customerPage.php">Home</a></li>
    <li class="user"><p>Welcome <a href="custpage.css">User</a></p></li>
    <li><a href="userHistory.php">History</a></li>
    <li><a href="first.php">Log out</a></li>
    </nav>
    <br>
    <h2>Edit your information</h2>
    <br>
<form action="connection1.php" method="post">
   <div class="input-field"><span> Id:</span> <input type="text" readonly name="customerEditId"><br></div>
    <div class="input-field"><span>First name: </span>  <input type="text" required name="customerEditFname"><br></div>
    <div class="input-field"><span>Middle name:</span>  <input type="text" required name="customerEditMname"><br></div>
    <div class="input-field"><span>Last name: </span>   <input type="text" required name="customerEditLName"><br></div>
    <div class="input-field"><span>Phone: </span>       <input type="text" required name="customerEditPhone"> <br></div>
    <div class="input-field"><span>Email: </span>       <input type="text" required name="customerEditEmail"> <br></div>
    <div class="input-field"><span>Password:</span>     <input type="text" required name="customerEditPassword"><br></div>
    <div class="input-field"><input type="submit" name="customerEditSubmit" value="Edit"></div>
</form>
<p>You need to log in again after any modification!!!!</p>
</body>
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
<script src="customerUser1.js"></script>
</html>