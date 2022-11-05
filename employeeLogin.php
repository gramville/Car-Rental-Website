
<head>
    <title>Employee Login Form</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="carPictures/vehicle-4.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>
                        <p>Your reliable source for your car needs</p>
<!--main form ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                        <form action="connection1.php" method="post">
        ID: <input type="text" required name="employeeLoginId"><br>
        Password: <input type="password" minlength="8" required name="employeeLoginPassword"><br>
        <input type="submit" name="employeeLoginSubmit">
    </form> 
                        <div class="social-icons">
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
            close=document.querySelector(".alert-close");
            close.addEventListener("click",()=>{
        window.open('first.php',"_self");
    })
                
    </script>
    

</body>

</html>















<!-- <h1>Employee Login</h1>
    <form action="connection1.php" method="post">
        ID: <input type="text" required name="employeeLoginId"><br>
        Password: <input type="text" required name="employeeLoginPassword"><br>
        <input type="submit" name="employeeLoginSubmit">
    </form> -->