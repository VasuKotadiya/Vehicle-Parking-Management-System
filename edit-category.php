<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $aid=$_SESSION['vpmsaid'];
     $catname=$_POST['catename'];
  $eid=$_GET['editid'];
   
    $query=mysqli_query($con, "update tblcategory set VehicleCat='$catname' where ID='$eid'");
    if ($query) {
    $msg="Category has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }
  ?>
<!doctype html>
<html class="no-js" lang="">

<head>    
    <title>VPMS - Manage Category</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
	
<style>
button[type=submit] {
  width: 10%;
  background-color: #47F8F9;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
}
</style>

</head>

<body class="dash-board">
  
   <?php include_once('includes/header.php');?>

        <h1>Dashboard</h1>
        <div class="search">
		     <strong>Update Category</strong>
        </div>

        <div class="search">
            <form action="" method="post" enctype="multipart/form-data">
                <p style="font-size:16px; color:red" align="center"> 
		            <?php if($msg){
                      echo $msg;
                    }  ?> 
                </p>
                     
                    <?php
                      $cid=$_GET['editid'];
                      $ret=mysqli_query($con,"select * from  tblcategory where ID='$cid'");
                      $cnt=1;
                      while ($row=mysqli_fetch_array($ret)) {
                    ?>              
                
				<div>
                    <label for="text-input" class=" form-control-label">Category Name</label> &nbsp &nbsp &nbsp
                    <input type="text" id="catename" name="catename" class="form-control" placeholder="Vehicle Category" required="true" value="<?php  echo $row['VehicleCat'];?>">
                </div>
                                 
                <?php } ?>
                                    
                <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Update</button>
				</p>
            </form>
        </div>

<?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>