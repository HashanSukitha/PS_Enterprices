<?php
session_start();
include('config.php');



$sql="UPDATE contract_header SET CONTR_DEP_TOT=(CONTR_DEP_TOT+".$_POST['NewAmt'].") WHERE CONTR_NO='".$_POST['contrNo']."'";

$res=mysqli_query($con, $sql);


if (!$res)
  {
  die('Error: ' . mysqli_error($con));
  }
else
{
		$sql="CALL INS_NEW_DEPOSIT_UPDATE ('".$_POST['contrNo']."','".$_POST['OldAmt']."','".$_POST['NewAmt']."','".$_POST['updtDate']."','".$_SESSION['OFFI_CODE']."')";	
		$res=mysqli_query($con, $sql);
		
		if (!$res)
		{
		  die('Error: ' . mysqli_error($con));
		 }
		else
		{
			echo 'Updated Successfully';
		}
} 
?>