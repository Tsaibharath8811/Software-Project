<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  AdminuserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['aid']=$ret['ID'];
     echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    }
    else{
     echo "<script>alert('Invalid Details');</script>";
      echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    }
  }
  ?>




<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Admin Login
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="../css/style.css"/>
  <!-- END Custom CSS-->


</head>
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- fixed-top-->
   <nav>
            <a href="#" class="logo">
                <img src="data:image/png;base64,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" class="image1" width="320px" />
                
                <img src="https://1.bp.blogspot.com/-zeWCdTyFgZ4/YMhnzVchAlI/AAAAAAAAFaA/aWBlSPn-kSEsRVVi-LmAqoDHIzsG7JoaQCLcBGAsYHQ/s0/logo.png" class="image2" width="60px" height="60px" />
            </a>
            <input class="menu-btn" type="checkbox" id="menu-btn"/>
            <label class="menu-icon" for="menu-btn">
                <span class="nav-icon"></span>
            </label>
            <ul class="menu" style="border-radius: 5px;">
                <li><a href="#">About</a></li>
                <li><a href="#">Notification</a></li>
                <li><a href="#">Results</a></li>
                <li><a href="#courses">Courses</a></li>
                <li><a class="active" href="../user/signup.php" onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius: 5px; cursor: pointer;">Sign Up</a></li>
                <li><a class="active" href="login.php" onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius: 5px; cursor: pointer;">sign in</a></li>
            </ul>
        </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0 pb-0">
                   <div class="card-title text-center">
              <h4 style="font-weight: bold"> Amrita Admin Login</h4>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" action="" name="login"  method="post">
                      
                        
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username"
                      required="true" >
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                        
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="password" id="password" class="form-control input-lg"
                            placeholder="Password" tabindex="5" required>
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
                          </fieldset>
                        
                       
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                          <button type="submit" name="login" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i> Login</button>
                        </div>
                        
                      </div>
                       <div class="col-6 col-sm-6 col-md-6">
                          <p><a href="forget-password.php">Forgot password?</a></p>
                        </div>
                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <p style="color:white;"> Developed By Group 10   </p>

    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="/../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>