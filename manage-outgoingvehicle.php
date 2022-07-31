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
   
    <title>Manage Incoming Vehicley</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css"> 
</head>
<body class="dash-board">
     <?php include_once('includes/header.php');?>
        <div class="page-title">
            <h1>Managing outgoing vehicle</h1>
        </div>
        <div class="content">
        <div class="content2">
        <table class="table">
        <thead>
            <tr>
            <tr>
            <th style="color: gray;">S.NO</th>
            <th style="color: gray;">Parking Number</th>
            <th style="color: gray;">Owner Name</th>
            <th style="color: gray;">Vehicle Reg Number</th>                 
            <th style="color: gray;">Action</th>
            </tr>
            </tr>
        </thead>
<?php
$ret=mysqli_query($con,"select *from   tblvehicle where Status='Out'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
              
            <tr>
            <td><?php echo $cnt;?></td>
            <td><?php  echo $row['ParkingNumber'];?></td>
            <td><?php  echo $row['OwnerName'];?></td>
            <td><?php  echo $row['RegistrationNumber'];?></td> 
            <td><a style="text-decoration:underline; color:blue" href="view-outgoingvehicle-detail.php?viewid=<?php echo $row['ID'];?>">View</a> | 
        <a style="text-decoration:underline; color:blue" href="print.php?vid=<?php echo $row['ID'];?>" style="cursor:pointer" target="_blank">Print</a>
            </td>
            </tr>
<?php $cnt=$cnt+1;}?>
        </table>

        </div>
        </div>
<?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>