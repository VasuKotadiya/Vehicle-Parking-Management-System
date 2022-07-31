<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['vpmsaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
  ?>
<!doctype html>
<html>
<head>
    
    <title>Change Password</title>
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
<body>
   <?php include_once('includes/header.php');?>
 <div class="page-title">
    <h1>Dashboard</h1>
 </div>
<div class="content">
   <div class="card">
       <div class="card-header">
            <strong>Change </strong> Password
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="changepassword" onsubmit="return checkpass();">
            <p style="font-size:16px; color:red" align="center"> <?php if($msg){ echo $msg;}  ?> </p>
<?php
$adminid=$_SESSION['vpmsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {?>
    <div class="row form-group">
    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Current Password</label></div>
    <div class="col-12 col-md-9"><input type="password" name="currentpassword" class=" form-control" required= "true" value=""></div>
    </div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="email-input" class=" form-control-label">New Password</label></div>
    <div class="col-12 col-md-9"><input type="password" name="newpassword" class="form-control" value="" required="true"></div>
    </div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Confirm Password</label></div>
    <div class="col-12 col-md-9"> <input type="password" name="confirmpassword" class="form-control" value="" required="true"></div>
    </div>
 <?php } ?>
    
    <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Change</button></p>
</form>
        </div>
    </div>
</div>
<?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>