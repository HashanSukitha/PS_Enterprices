<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('config.php');

$cntrNo  = $_POST['cntrNo'];



$sql1 = "SELECT * FROM contract_details WHERE CONTR_NO='".$cntrNo."'";
$res1 = mysqli_query($con, $sql1);		
if (!$res1)
{
	 die('Error: at Query 1' . mysqli_error($con));
}
else
{
	while($row12 = mysqli_fetch_assoc($res1)) 
	{
		if($row12["ITM_TYPE"]=='Individual')
		{
		
			$res11=mysqli_query($con,"update items SET ITM_STS='A'  where ITM_CODE='".$row12["ITM_CODE"]."'");
			if (!$res11)
			{
				die('Error: at Query 2' . mysqli_error($con));
			}
		}
		else
		{
			$res22=mysqli_query($con,"update items SET ITM_QTY=ITM_QTY+".$row12["ALLOWED_QTY"]."  where ITM_CODE='".$row12["ITM_CODE"]."'");
			if (!$res22)
			{
				die('Error: at Query 3' . mysqli_error($con));
			}
		}
	}
}
date_default_timezone_set('Asia/Colombo');

//====================================================================================================================================================================
$res2=mysqli_query($con,"update contract_details SET 	RETURN_STS='YES' ,		RTNED_OFFI_CODE='".$_SESSION['OFFI_CODE']."' where CONTR_NO='".$cntrNo."'");
if (!$res2)
{
	die('Error: at Query 4' . mysqli_error($con));
}
else
{
	$res3=mysqli_query($con,"update contract_header SET	CONTR_STS='C' ,	CONTR_CLOSE_DATE='".date("Y-m-d H:i")."' where CONTR_NO='".$cntrNo."'");
	if (!$res3)
	{
		die('Error: at Query 5' . mysqli_error($con));
	}
	else
	{
	echo "Cancelled Successfully";
	}

}


?>