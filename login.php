<?php
    require_once 'conn.php';

    if (!empty($_SESSION['teacher_id']))
  {
   header("location: index.php");
  }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RNHS Assistfit - Login Page</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

    <body class="form-login-body"> 
        <div class="container-fluid">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 logo">
                            
                        </div>
                        <div class="col-md-9 sup">
                            <ul>
                                <!-- <li><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-user-lock"></i> Login</button></li> -->
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-body container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="login-text">
                                    <form action="process_login.php" method="POST">
                                    <h4>Login to your Account</h4>
                                    
                                    <input type="text" name="username" placeholder="Enter Username" class="form-control ">
                                    
                                     <input type="password" name="password" placeholder="Enter Password" class="form-control">
                                     
                                     
                                     
                                     <button class="btn btn-primary" type="submit" name="login">Sign In</button>
                                     <p>Dont have an account? Contact Administrator</p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="login-img">
                                    <img src="assets/images/login.png" alt="">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
        </div>
    </body>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="assets/plugins/slider/js/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
</html>
