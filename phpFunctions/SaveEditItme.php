<?php
session_start();
include('config.php');



$sql="UPDATE items SET ITM_QTY=(ITM_QTY+".$_POST['QTY'].") WHERE ITM_CODE=".$_POST['itmCode'];


$res=mysqli_query($con,$sql);


if (!$res)
  {
  die('Error: ' . mysqli_error($con));
  echo 'Page is broken'; 
  }
else
{
	echo 'Saved Successfully';
}

?>