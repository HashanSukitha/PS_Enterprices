<?php
include('config.php');


$name=$_POST['name'];

$sql="CALL INS_SUPPLIER('".$name."',@SUP_CODE)";

mysqli_query($con,$sql);
$res=mysqli_query($con, "SELECT @SUP_CODE");


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