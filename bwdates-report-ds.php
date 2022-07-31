<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>

<!doctype html>
<html class="no-js" lang="">
<style>
input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #D6240F;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
}
</style>
<head>
     <title>Reports</title>
        <link rel="stylesheet" href="assets/css/stylelogin.css">  
</head>

<body class="dash-board">

   <?php include_once('includes/header.php');?>
   <div class="bdr">
        <h1><center>Between Dates Reports</center></h1>
  
          <form action="bwdates-reports-details.php" method="post" enctype="multipart/form-data" name="bwdatesreport">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;  }  ?> </p>
                                  
      <div >
          <label for="text-input">From Date</label><br>
        <input type="date" name="fromdate" id="fromdate" size="50" placeholder="yyyy/mm/dd" required="true"><br><br>
    </div>
              
  <div >
      <label for="email-input">To Date</label><br>
    <input type="date" name="todate" size="50" placeholder="yyyy/mm/dd" required="true"><br>
  </div>
	<br>
									
  <center><button type="submit" name="submit" >Submit</button></center>
</form>
  </div>
<br><br><br>

<?php include_once('includes/footer.php');?>
</body>
</html>
<?php }  ?>