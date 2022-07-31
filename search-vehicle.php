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
    <title>VPMS - Search Vehicle</title>
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
        <div class="page-title">
            <strong >Search Vehicle</strong>
        </div>
		
		<br>
                        
		<div>
            <form action="" method="post" enctype="multipart/form-data"  name="search">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
                    echo $msg;
                }?> 
				</p>
                                   
                <div class="search">
                    <label for="text-input" >Search By Parking Number :</label> &nbsp &nbsp &nbsp 
				    <input style="height:1.3rem;" type="text" id="searchdata" name="searchdata" required="required" autofocus="autofocus" size="80" >
                
				    <button type="submit"  name="search"  >Search</button>
            </form>
        </div>
<?php
if(isset($_POST['search']))
{ $sdata=$_POST['searchdata'];
?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 
                             
		<table style="background-color:silver; color:black;">
            <thead>
            <tr>
                <tr>
                    <th><center>S.NO</center></th>
                    <th><center>Parking Number</center></th>
                    <th><center>Owner Name</center></th>
                    <th><center>Vehicle Reg. Number</center></th>
                    <th><center>Action</center></th>
                </tr>
            </tr>
        </thead>

<?php
$ret=mysqli_query($con,"select *from   tblvehicle where ParkingNumber like '$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
              
            <tr>
                <td><center><?php  echo $cnt;?></center></td>
                <td><center><?php  echo $row['ParkingNumber'];?></center></td>
                <td><center><?php  echo $row['OwnerName'];?></center></td>
                <td><center><?php  echo $row['RegistrationNumber'];?></center></td>
                <td><center><a href="view-incomingvehicle-detail.php?viewid=<?php echo $row['ID'];?>">View</a></center></td>
            </tr>

<?php 
$cnt=$cnt+1;
} } else { ?>
                 
	        <tr>
                <td colspan="8"> No record found against this search</td>
            </tr>
   
<?php } }?>
        
		</table>

        </div>
               
<?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>