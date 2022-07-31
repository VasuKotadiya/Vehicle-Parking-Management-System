<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['vpmsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    $msg="Admin profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!doctype html>
<html>

<head>
    <title>Admin Profile</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
	
<style>
button[type=submit] {
  width: 10%;
  background-color: #D6240F;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
}
</style>	
	
</head>

<body class="dash-board">
  
   <?php include_once('includes/header.php');?>
    
    <div style="font-family: Arial;
	font-size: 2.5rem;
	color: rgb(232, 232, 240); letter-spacing:.3rem" >
        <strong>Admin  Profile </strong>
    </div>
    
	<div>
        <form action="" method="post" enctype="multipart/form-data">
            <p style="font-size:16px; color:red" align="center"> 
				<?php if($msg){
                echo $msg;
                }  ?> 
		    </p>
                                   
			<?php
            $adminid=$_SESSION['vpmsaid'];
            $ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {
            ?>
			
			<div class="search">
                
				<div class="admin-2">
                    <label for="text-input" class=" form-control-label">Admin Name :</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input class=" form-control" id="adminname" name="adminname" size="40" type="text" value="<?php  echo $row['AdminName'];?>">
                </div>
                                    
				<div class="admin-2">
                    <label for="email-input" class=" form-control-label">User Name :</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input class=" form-control" id="username" name="username" size="40" type="text" value="<?php  echo $row['UserName'];?>"  readonly='true'>
                </div>
                                    
			    <div class="admin-2">
                    <label for="password-input" class=" form-control-label">Contact Number :</label> &nbsp &nbsp &nbsp
                    <input class="form-control " id="contactnumber" name="contactnumber" size="40" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true">
                </div>
                                    
		        <div class="admin-2">
                    <label for="disabled-input" class=" form-control-label">Email :</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input class="form-control " id="email" name="email" size="40" type="email" value="<?php  echo $row['Email'];?>" required="true" readonly='true'>
                </div>
                                  
				<?php } ?>
                                    
			  <center><button type="submit" name="submit" >Update</button></center>
        </div>

		</form>

    </div>

   <?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>