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
    <title>Reports</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
	
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>

</head>

<body class="dash-board">
    
     <?php include_once('includes/header.php');?>

     <h1><center><u>Between Date Reports</u></center></h1>
        
     <?php
      $fdate=$_POST['fromdate'];
      $tdate=$_POST['todate'];
     ?>
<h3 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h3>
            <table style="background-color:silver; color:black;" >
                <thead>
                <tr>
                  <th><center>S.NO</center></th>
                  <th><center>Parking Number</center></th>
                  <th><center>Owner Name</center></th>
                  <th><center>Vehicle Reg Number</center></th>
                  <th><center>Action</center></th>
                </tr>
                </thead>
               
<?php
$ret=mysqli_query($con,"select *from   tblvehicle where date(InTime) between '$fdate' and '$tdate'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
              
                <tr>
                  <td><center><?php echo $cnt;?></center></td>
                  <td><center><?php  echo $row['ParkingNumber'];?></center></td>
                  <td><center><?php  echo $row['OwnerName'];?></center></td>
                  <td><center><?php  echo $row['RegistrationNumber'];?></center></td>
                  
                  <td><center><a href="view-incomingvehicle-detail.php?viewid=<?php echo $row['ID'];?>">View</a></center></td>
                </tr>
<?php 
$cnt=$cnt+1;
}?>
            </table>

<?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>