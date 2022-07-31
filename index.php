<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
?>

<!doctype html>
<html lang="">
<head>
    
    <title>PMS-Login Page</title>
	
    <link rel="stylesheet" href="assets/css/stylelogin.css">

</head>
<body class="login-page" >

                    <a href="index.php">
                        <h1 style="color: #fff">Parking Management System</h1>
                    </a>
                
                    <form method="post">
                         <p style="font-size:16px; color:white" align="center"> 
							<?php 
						 if($msg){
							echo $msg;
							}  
							?> 
						</p>
                           <h2><label>Username&nbsp;&nbsp;&nbsp;&nbsp;</label>  
                           <input class="form-control" type="text" placeholder="Username" required="true" name="username" id="submit">
							</h2>
							<h2><label>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="true" id="submit">
							</h2><br><br>
							
                            <label>
							    <a href="forgot-password.php" style="font-size: 20px; color: #fff">Forgotten Password?</a>
                            </label>
							<br><br>
                        <button type="submit" name="login" id="submit">Sign in</button>
                       
                       
                    </form>
</body>
</html>