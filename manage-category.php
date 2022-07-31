<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>

<html>
<head>
   
    <title>Manage Category</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css"> 
</head>
<body class="dash-board">
<?php include_once('includes/header.php');?>      
        <div class="page-title">
            <h1>Manage Category</h1>
        </div>

        <div class="content2">
            <div>   
                <div class="card-body">
                <table class="table">
                <thead>
                <tr>
                <tr>
                <th>S.NO</th>

                <th>CATEGORY</th>
                   
                <th>ACTION</th>
                </tr>
                </tr>
                </thead>
<?php
$ret=mysqli_query($con,"select * from  tblcategory");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
              
                <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['VehicleCat'];?></td>
                <td style="text-decoration:underline; color:blue"><a href="edit-category.php?editid=<?php echo $row['ID'];?>" >Edit Details</a></td>
                </tr>
<?php 
$cnt=$cnt+1;
}?>
                </table>
                </div>
            </div>
        </div>
<?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>