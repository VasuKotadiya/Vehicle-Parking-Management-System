<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

    $query=mysqli_query($con,"update tbladmin set Password='$password' where Email='$email' && MobileNumber='$contactno' ");
    if($query)
    {
	header('location:index.php');
	echo "<script>alert('Password successfully changed');</script>";
	session_destroy();
    }
  
  }
  ?>
<!doctype html>
<html lang="">
<head>
    
    <title>PMS-Reset Page</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
	<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 
</script>
</head>
<body class="login-page">
                    <a href="index.php">
                       <h2 style="color: white">Parking Management System</h2>
                    </a>
            <form action="" method="post" name="changepassword" onsubmit="return checkpass();">
                <p style="font-size:16px; color:red" align="center"> 
				    <?php if($msg)
					{
						echo $msg;
				    }  ?> 
				</p>
                <h2><label>New Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" name="newpassword" placeholder="New Password" required="true" id="submit">
                </h2>
                <h2><label>Confirm Password</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" required="true" id="submit">
                </h2>
                <label>
                    <a href="index.php "style="font-size: 20px; color: #fff">Signin</a>
                </label>
				<br><br>
                <button type="submit" name="submit" id="submit">Reset</button>
                       
                       
            </form>
</body>
</html>