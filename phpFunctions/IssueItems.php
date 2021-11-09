<?php
session_start();
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('config.php');

$sql="CALL INS_ITEM_TAKEN('".$_POST['itmCode']."',
						   '".$_POST['ContrNo']."',
						   '".$_POST['tknDate']."',
						   '".$_POST['tknQty']."',
						   '".$_POST['personNIC']."',
						   '".$_POST['personName']."',
						   '".$_POST['vhNum']."',
						   '".$_SESSION['OFFI_CODE']."',
						   '".$_POST['loc']."')";


$res=mysqli_query($con,$sql);


if(!$res)
  {
  die('Error: ' . mysqli_error($con));
  echo 'Page is broken'; 
  }
else
{

	if($_POST['pnDnQty']!="0")
	{
		$sql1="UPDATE contract_details SET ISSUED_QTY=(ISSUED_QTY+".$_POST['tknQty'].") WHERE CONTR_NO='".$_POST['ContrNo']."' AND ITM_CODE='".$_POST['itmCode']."'";
		$res1=mysqli_query($con,$sql1);
		
		if(!$res1)
		{
		  die('Error: ' . mysqli_error($con));
		  echo 'Page is broken'; 
		}
		else
		{
			echo 'Saved Successfully';
		}
	}
	else
	{
		$sql2="UPDATE contract_details SET ISSUED_QTY=(ISSUED_QTY+".$_POST['tknQty'].") , ISSUED='YES'  WHERE CONTR_NO='".$_POST['ContrNo']."' AND ITM_CODE='".$_POST['itmCode']."'";
		$res2=mysqli_query($con,$sql2);
		
		if(!$res2)
		{
		  die('Error: ' . mysqli_error($con));
		  echo 'Page is broken'; 
		}
		else
		{
			echo 'Saved Successfully';
		}
	}
	
}

?>