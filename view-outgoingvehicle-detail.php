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
   
    <title>View Vehicle Detail</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css"> 
</head>
<body class="veiw">
 <?php include_once('includes/header.php');?>
    <div class="page-title">
        <h1>Veiw outgoing Vehicle</h1>
    </div>

    <div class="veiw-content">
<?php
 $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblvehicle where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {?>                       
    <table border="1" class="table">
   <tr>
   <th style="color: black; font-weight:1000">Parking Number</th>
    <td><?php  echo $row['ParkingNumber'];?></td>
    </tr>                             
    <tr>
    <th style="color: black; font-weight:1000">Vehicle Category</th>
    <td><?php  echo $row['VehicleCategory'];?></td>
    </tr>
    <tr>
    <th style="color: black; font-weight:1000">Vehicle Company Name</th>
    <td><?php  echo $packprice= $row['VehicleCompanyname'];?></td>
    </tr>
    <tr>
    <th style="color: black; font-weight:1000">Registration Number</th>
    <td><?php  echo $row['RegistrationNumber'];?></td>
    </tr>
    <tr>
    <th style="color: black; font-weight:1000">Owner Name</th>
    <td><?php  echo $row['OwnerName'];?></td>
    </tr>
    <tr>  
    <th style="color: black; font-weight:1000">Owner Contact Number</th>
    <td><?php  echo $row['OwnerContactNumber'];?></td>
    </tr>
    <tr>
    <th style="color: black; font-weight:1000" >In Time</th>
    <td><?php  echo $row['InTime'];?></td>
    </tr>
    <tr>
    <th style="color: black; font-weight:1000">Out Time</th>
    <td><?php  echo $row['OutTime'];?></td>
    </tr>
    <tr>
    <th style="color: black; font-weight:1000">Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>
   <tr>
    <th style="color: black; font-weight:1000">Status</th>
    <td><?php echo $row['Status']; ?></td>
  </tr>
<tr>
   <tr>
    <th style="color: black; font-weight:1000">Parking Fee</th>
   <td><?php echo $row['ParkingCharge']; ?></td>
  </tr>
</table>

</div>
<?php } ?>
<?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>