<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $catname=$_POST['catename'];
     
    $query=mysqli_query($con, "insert into  tblcategory(VehicleCat) value('$catname')");
    if ($query) {
    $msg="Category has been added.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  ?>
<!doctype html>
<html>
<head>
    
    <title>Add-Category</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">  

</head>
<body class="dash-board">
    <?php include_once('includes/header.php');?>   

    <div class="page-title">
        <h1>Add Category</h1>
    </div>
       

        <div class="content">
      
        <div >
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg; }  ?> </p>
               
                <label for="text-input">Category Name: </label>
                <input type="text" id="catename" name="catename" placeholder="Vehicle Category" required="true" style="width: 80%; margin-top:1.1rem; margin-left:13rem; height: 2.2rem">
                   
            <center><button type="submit" name="submit" >Add</button></center>
        </form>
        </div>
     
        </div>

   <?php include_once('includes/footer.php');?>





</body>
</html>
<?php }  ?>