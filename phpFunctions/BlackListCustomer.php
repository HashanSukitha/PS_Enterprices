<?php
session_start();
include('config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

$res1=mysqli_query($con,"update customer SET CL_STS='B' WHERE CL_CODE='".$_POST['CusId']."'");
if (!$res1)
{
	die('Error:' . mysqli_error($con));
}


?>