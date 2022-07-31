<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
      $parkingcharge=$_POST['parkingcharge'];
     
 
    
     
   $query=mysqli_query($con, "update  tblvehicle set Remark='$remark',Status='$status',ParkingCharge='$parkingcharge' where ID='$cid'");
    if ($query) {
    $msg="All remarks has been updated.";
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
   
    <title>View Vehicle Detail</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css"> 
</head>
<body class="veiw">
     <?php include_once('includes/header.php');?>
        <div class="page-title" >
          <h1>Veiw-incoming vehicle</h1>
        </div> 
  <div class="veiw-content">
<?php $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblvehicle where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>                       
      <table border="1">
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
      <th style="color: black; font-weight:1000">In Time</th>
      <td><?php  echo $row['InTime'];?></td>
      </tr>

      <tr>
      <th style="color: black; font-weight:1000">Status</th>
      <td> 
<?php  
if($row['Status']=="")
{
  echo "Vehicle In";
}
if($row['Status']=="Out")
{
  echo "Vehicle out";
};?>
      </td>
      </tr>
      </table>
    <table class="table">

      <?php if($row['Status']==""){ ?>
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>

      <tr>
    <th style="color: black; font-weight:1000">Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="7" cols="50" class="form-control" required="true"></textarea></td>
    </tr>
    <tr>
    <th style="color: black; font-weight:1000">Parking Charge: </th>
    <td>
    <input type="text" name="parkingcharge" id="parkingcharge" class="form-control" >
    </td></tr>
    <tr>
    <th style="color: black; font-weight:1000">Status :</th>
    <td>
   <select name="status" class="form-control" required="true" >
     <option value="Out">Outgoing Vehicle</option>
   </select></td>
  </tr>
  </table>
  <button type="submit" name="submit" style="margin-left:40rem; padding:.6rem .1rem" >Update</button>
    </form>
   
<?php } else { ?>
    <table border="1" class="table">
  <tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>
<tr>
   <tr>
    <th>Parking Fee</th>
   <td><?php echo $row['ParkingCharge']; ?></td>
  </tr>

  

<?php } ?>
</table>
<?php } ?>
</div>
<?php include_once('includes/footer.php');?>

</body>
</html>
<?php }  ?>