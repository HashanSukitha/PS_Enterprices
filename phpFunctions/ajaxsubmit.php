<?php
include('config.php');


$name=$_POST['name'];

$sql="CALL INS_CUSTOMER('".$name."',@CL_CODE)";



//$clcode=mysqli_query($con,$sql);

     mysqli_query($con,$sql);
$res=mysqli_query($con, "SELECT @CL_CODE");
//or die("Error: ".mysqli_error($con));

if (!$res)
  {
  die('Error: ' . mysqli_error($con));
  echo '<div id="cretMsgContainer">
		<div class="cretMsg">Ooooops, Sorry</div>
		<div>Page is broken</div>
	  </div>
	 '; 
  }
else
{
	$row = mysqli_fetch_array($res,MYSQLI_NUM);
	 
		  echo $row[0]; 
	
	
} 
?>