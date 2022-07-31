<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!doctype html>
 <html lang="">
<head>
    
    <title>PMS-Forgot Page</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    </head>
	<body class="login-page">

                    <a href="index.php">
                         <h1 style="color: white">Parking Management System</h1>
                    </a>
                
                    <form method="post">
                         <p style="font-size:16px; color:white" align="center"> 
						 <?php if($msg){
							echo $msg;
						}  ?> </p>
                        <h2>
                            <label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                           <input type="text" class="form-control" name="email" placeholder="Email" autofocus required="true" id="submit">
                        </h2>
                        <h2>
                            <label>Mobile Number&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="contactno" placeholder="Mobile Number" required="true" id="submit">
                        </h2>
                        
                            
                            <label>
                                <a href="index.php "style="font-size: 20px; color: #fff">Signin</a>
                            </label>
							<br><br>

                        
                        <button type="submit" name="submit" id="submit">Reset</button>
                       
                       
                    </form>
      
</body>
</html>
