<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $parkingnumber=mt_rand(100000000, 999999999);
    $catename=$_POST['catename'];
     $vehcomp=$_POST['vehcomp'];
    $vehreno=$_POST['vehreno'];
    $ownername=$_POST['ownername'];
    $ownercontno=$_POST['ownercontno'];
    $enteringtime=$_POST['enteringtime'];
    
     
    $query=mysqli_query($con, "insert into  tblvehicle(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno')");
    if ($query) {
echo "<script>alert('Vehicle Entry Detail has been added');</script>";
echo "<script>window.location.href ='manage-incomingvehicle.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
    }

  
}
  ?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="assets/css/stylelogin.css"> 
    <title>Add Vehicle</title>
</head>
<body class="dash-board">
   <?php include_once('includes/header.php');?>
        <div class="page-title">
            <h1>Add Vehchile</h1>
        </div>
            <div class="content" style="height: 28rem; background-color:rgba(111, 235, 228, 0.5); box-shadow:6px 6px 7.5px grey">
                <div class="form-area">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>
                    <div class="row">
                    <label for="select" >Select:</label>
                    <select name="catename" id="catename" style="width: 20rem; height:2.2rem; margin-left:8rem; margin-top:-2.1rem">
                    <option value="0" >Select Category</option>
                    <?php $query=mysqli_query($con,"select * from tblcategory");while($row=mysqli_fetch_array($query)){?>    
                    <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                    </select>
                    </div>

                    <div class="row">
                        <label for="text-input">Vehicle Company:</label>
                        <input type="text" id="vehcomp" name="vehcomp" style="width: 20rem; height:2.2rem; margin-left:4rem; margin-top:-2.1rem" placeholder="Vehicle Company" required="true">
                    </div>
                                 
                    <div class="row">
                        <label for="text-input" >Registration Number:</label>
                        <input type="text" id="vehreno" name="vehreno" style="width: 20rem; height:2.2rem; margin-left:4rem; margin-top:-2.1rem" placeholder="Registration Number" required="true">
                    </div>

                    <div class="row">
                        <label for="text-input">Owner Name:</label>
                        <input type="text" id="ownername" name="ownername" style="width: 20rem; height:2.2rem; margin-left:4rem; margin-top:-2.1rem" placeholder="Owner Name" required="true">
                    </div>
                                     
                    <div class="row">
                        <label for="text-input">Owner Contact Number:</label>
                        <input type="text" id="ownercontno" name="ownercontno" style="width: 20rem; height:2.2rem; margin-left:4rem; margin-top:-2.1rem" placeholder="Owner Contact Number" required="true" maxlength="10" pattern="[0-9]+">
                    </div>
                                   
                <button type="submit" style="margin-left: 45rem; margin-top:1.2rem" name="submit" >Add</button>
                </form>
            </div>
                            
        </div>

   <?php include_once('includes/footer.php');?>
</body>
</html>
<?php }  ?>