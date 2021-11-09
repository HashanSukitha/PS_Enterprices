<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('config.php');


$sql="CALL INS_DAMAGES ('".$_POST['itmCode']."','".$_POST['ContrNo']."','".$_POST['DmgItmLoc']."','".$_POST['dmgCmnt']."','".$_POST['dmgDate']."','".$_SESSION['OFFI_CODE']."')";


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