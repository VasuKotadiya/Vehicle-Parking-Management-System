<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>


<!doctype html>

<html lang="">
<head>
    <title>Admin Dashboard</title>
	 
	<link rel="stylesheet" href="assets/css/stylelogin.css"> 
</head>

<body class="dash-board"> 
	
	<?php include_once('includes/header.php');?>                 
	<div class="trans-box">
	<br><br>
	<div class="page-title">
        <h1>Dashboard</h1>
    </div>
       
	<?php //todays Vehicle Entries
		$query=mysqli_query($con,"select ID from tblvehicle where date(InTime)=CURDATE();");
		$count_today_vehentries=mysqli_num_rows($query);
	?>
	<div style="font-size:16px; padding:20px; width:20%; display: inline-block; background-color:silver; color:black; text-align:center;">
	Todays Entries:<br>
	<?php //todays Vehicle Entries
		echo $count_today_vehentries;
	?>
	</div>
	 
	<?php //Yesterdays Vehicle Entrie
		$query1=mysqli_query($con,"select ID from tblvehicle where date(InTime)=CURDATE()-1;");
		$count_yesterday_vehentries=mysqli_num_rows($query1);
	?>
	<div style="font-size:16px; padding:20px; width:20%; display: inline-block; background-color:silver; color:black; text-align:center;">
	Yesterdays Entries:<br>
	<?php //Yesterdays Vehicle Entries
		echo $count_yesterday_vehentries;
	?>
	</div>
	
	<?php //Last Sevendays Vehicle Entries
		$query2=mysqli_query($con,"select ID from tblvehicle where date(InTime)>=(DATE(NOW()) - INTERVAL 7 DAY);");
		$count_lastsevendays_vehentries=mysqli_num_rows($query2);
	?>
	<div style="font-size:16px; padding:20px; width:20%; display: inline-block; background-color:silver; color:black; text-align:center;">
	Last 7 Days Entries:<br>
	<?php //Last Sevendays Vehicle Entries
		echo $count_lastsevendays_vehentries;
	?>
	</div>
	
	<?php //Total Vehicle Entries
		$query3=mysqli_query($con,"select ID from tblvehicle");
		$count_total_vehentries=mysqli_num_rows($query3);
	?>
	<div style="font-size:16px; padding:20px; width:20%; display: inline-block; background-color:silver; color:black; text-align:center;">
	Total Entries:<br>
	<?php //Total Vehicle Entries
		echo $count_total_vehentries;
	?>
	</div>
	<br><br>
  </div>
	<br><br>
	
    <?php include_once('includes/footer.php');?>

   
</body>
</html>
<?php } ?>