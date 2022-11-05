<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="firstcss.css">
</head>
<body>

    <h1>Mekina <span>.Com</span></h1>
    <nav>
        
        <li><a href="first.php">Home</a></li>
        <li><a href="index.php">Customer</a></li>
        <li><a href="employeeLogin.php">Employee</a></li>
    </nav>
    <h2>Find your ideal car</h2>
    <section class="front_page">
        
        <img src="carPictures/logo.png" alt=""> <br>
        
        
        </section>
        <div class="displayedCars">
        <?php
        // open this directory 
        $myDirectory = opendir("carPictures");
        // get each entry
        while($entryName = readdir($myDirectory)) {
           $dirArray[]=$entryName;
            //$dirArray[] = $entryName;
        }
            for($i=2;$i<count($dirArray);$i++){
                if($dirArray[$i]!="board1.jpg"&&$dirArray[$i]!="board2.jpg"&&$dirArray[$i]!="board3.jpg")//||$entryName!="carPictures/."||$entryName!="carPictures/..")
            echo "<img src='carPictures/$dirArray[$i]'>";

            if($i==7) break;
            }
    
        // close directory
        closedir($myDirectory);
        /* for($i=0;$i<count($dirArray);$i++){
            
            if($i%2==0){
                echo "<BR>";
            }
        } */
        ?>
        
        </div>
    
</body>
<script src="first.js"></script>
</html>