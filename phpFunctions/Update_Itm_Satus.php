<?php
include('config.php');


$itmCode=$_POST['itmCode'];
$itmSts=$_POST['itmSts'];

//====================================================================================================

$sql="UPDATE items SET ITM_STS='".$itmSts."' WHERE ITM_CODE='".$itmCode."'";



$res=mysqli_query($con, $sql);


if (!$res)
  {
  die('Error: ' . mysqli_error($con));
  }
else
{
//
} 
?>