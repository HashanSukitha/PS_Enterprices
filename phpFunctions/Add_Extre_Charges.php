<?php
session_start();
include('config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');


$contr_no=$_POST['contr_no'];
$desc=$_POST['desc'];
$amt=$_POST['amt'];








$sql="insert into extra_charges(CONTR_NO,CHRG_DESC,AMT) values('".$contr_no."','".$desc."','".$amt."')";




$res=mysqli_query($con,$sql);


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
	
	 
		  echo "Extra Charges Successfully Saved"; 
} 
?>