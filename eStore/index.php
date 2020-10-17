<?php

session_start();
include("lib/dblib.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eStore | Home</title>


<link href="css/font-awesome.css" rel="stylesheet">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">

<link id="switcher" href="css/default-color.css" rel="stylesheet">


<!-- Main style sheet -->
<link href="css/style.css" rel="stylesheet">

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


</head>
<body>

<!-- Start header section -->
<header id="aa-header"> 
  
  <!-- start header bottom  -->
  <div class="aa-header-bottom">
    <div class="container">

            <!-- logo -->
            <div class="logo">
              <h2><strong>eStore</strong></h2>
            </div>
            <!-- / logo --> 
			
            <!-- login -->
            <div class="aa-cartbox">
              <ul>
                <li><a href='' data-toggle='modal' data-target='#login-modal'>Sign up</a></li>
				<li><a href='' data-toggle='modal' data-target='#login-modal_'>Sign in</a></li>
              </ul>
            </div>
            <!-- / login --> 
          
			<!-- search box -->
            <div class="aa-search-box">
              <form action="">
                <input type="text" name="" id="" placeholder="Search for anything ">
                <button type="submit"><span class="fa fa-search"></span></button>
              </form>
            </div>
            <!-- / search box --> 
			<!-- login -->

            <!-- / login --> 			

          </div>
        </div>

  </div>
  <!-- / header bottom  --> 
</header>
<!-- / header section --> 
<!-- menu -->
<section id="menu">
  <div class="container">
    <div class="menu-area"> 
      <!-- Navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="navbar-collapse collapse"> 
          <!-- Left nav -->

          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            
			<?php getTypeOfItems(); ?>
            
            <li style="float:right"><a>
            <?php
				if(isset($_SESSION['cust_email'])){
					echo "Welcome " . $_SESSION['cust_email'];
				}
				else{
					echo "Welcome Guest";
				}
				
			?></a>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
    </div>
  </div>
</section>
<!-- / menu --> 
 


<!-- Sign up Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Create your account</h4>
		
        <form class="aa-login-form" action="" method="post">
          <label for="">First Name<span>*</span></label>
          <input type="text" name="f_name">
          <label for="">Last Name<span>*</span></label>
          <input type="text" name="l_name">  
		  <label for="">Email address<span>*</span></label>
          <input type="text" name="email">
          <label for="">Password<span>*</span></label>
          <input type="password" name="pass">          
		  <button class="aa-browse-btn" name="login" type="submit">Sign up</button>
        </form>
        <?php
		
		?>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>


<!-- Sign in Modal -->
<div class="modal fade" id="login-modal_" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

        <h4>Sign in</h4>
		
        <form class="aa-login-form" action="" method="post">
          <label for="">Email address<span>*</span></label>
          <input type="text" name="email">
          <label for="">Password<span>*</span></label>
          <input type="password" name="pass">          
          <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme">Stay signed in?</label>
          <p class="aa-lost-password"><a href="#">Forgot my password</a></p>
		  <button class="aa-browse-btn" name="login" type="submit">Sign in</button>
        </form>
        <?php
		
			if(isset($_POST['login'])){
				
				$c_email=$_POST['email'];
				$c_pass=$_POST['pass'];
			
				$sel_c = "select * from customers where cust_email='$c_email' AND cust_pass='$c_pass'";
				$run_c = mysqli_query($conn, $sel_c);
				
				$check_customer = mysqli_num_rows($run_c);
				
				if($check_customer==0){
					echo"<script>alert('Password or Email is incorrect! plz try again')</script>";
				}else{
				$_SESSION['cust_email']=$c_email;
				echo "<script>alert('Login Successful !')</script>";
				}
				
				
			}
		?>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>

<!-- jQuery library --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script> 
<!-- SmartMenus jQuery plugin --> 
<script type="text/javascript" src="js/jquery.smartmenus.js"></script> 
<!-- SmartMenus jQuery Bootstrap Addon --> 
<script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script> 

</body>
</html>