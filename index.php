<?php
require 'config/DB.php';
require 'config/base_url.php';
session_start();

$connection = mysqli_connect('localhost','root','','rumahlaundry381');

 
   
  
if(isset($_POST['submit'])){
    $nama =$_POST['email'];
    $adm = mysqli_query($connection,"SELECT * FROM users WHERE nama = '$nama' AND role='admin'");
    $owner = mysqli_query($connection,"SELECT * FROM users WHERE nama = '$nama' AND role='owner'");
if(mysqli_num_rows($adm) > 0){
   $_SESSION['role'] = 'admin';
   $_SESSION['nama'] = "$nama";
   
   

    header("Location: admin.php");
}else if(mysqli_num_rows($owner) > 0){
    $_SESSION['role'] = 'owner';
    $_SESSION['nama'] = "$nama";
    
    header("Location: owner.php");
    
}
else{
    $error = true;
    
  }
}


     ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 "><b>Welcome Admin|Owner RL381</b></h1>
                                    </div>
                                    <div class="text-center">
                                        <img width="150" height="60" src="<?= ROOT;?>asset/img/logo.jpg" alt="">
                                    </div>
                                    <?php if(isset($error)) : ?>
    <p style="color:red; font-style:italic;"><b>Username / Password Salah</b></p>
    <?php endif; ?>
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" 
                                                placeholder="Enter Email Address..." name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" autocomplete="off" required>
                                        </div>
                                       
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">
                                            Login
                                        </button>
                                        <!-- <hr> -->
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook -->
                                        <!-- </a> -->
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <!-- <a class="small" href="register.php">Create an Account!</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>