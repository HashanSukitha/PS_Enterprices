<?php
session_start();
include('config.php');
include('../SMS/ContractCreatedSMS.php');


$udxarr    = json_decode(str_replace('\\', '', $_POST['newOrder']));
$rowCount  = $_POST['rows'];
$ClintCode = $_POST['CliCode'];
$Camt=$_POST['cntrAmt'];
$Cdate=$_POST['cntrDate'];
$CnfItms=$_POST['nfItms'];
$CdepAmt=$_POST['cDepAmt'];

//=============================================================================

$sql="CALL SAV_CONTRACT('".$ClintCode."','".$Camt."','".$Cdate."','".$CnfItms."','".$CdepAmt."','".$_SESSION['OFFI_CODE']."',@CONTR_NO)";

mysqli_query($con,$sql);
$res=mysqli_query($con, "SELECT @CONTR_NO");


if (!$res)
  {
  die('Error: ' . mysqli_error($con));
  }
else
{
	$row = mysqli_fetch_array($res,MYSQLI_NUM);
	 
		   	
		  //============================================
		  for($i=0;$i<$rowCount;$i++)
		  {
		   $strng='';
		        //============================================
				for($j=0;$j<=10;$j++)
				{
					
					 $strng=$strng.$udxarr[$i][$j]." ";
					//echo $strng;
					//echo "<br>";
					//SAV_CONTR_ITMS
					$ItmCode=$udxarr[$i][0];
					$ItmName=$udxarr[$i][1];
					$Hto=$udxarr[$i][2];
					$Basis=$udxarr[$i][3];
					$NofDays=$udxarr[$i][4];
					$DlyChrg=$udxarr[$i][5];
					$MnlyChrg=$udxarr[$i][6];
					$ItmQty=$udxarr[$i][7];
					$ItmTot=$udxarr[$i][8];
					$Depst=$udxarr[$i][9];
					$ItmType=$udxarr[$i][10];
					$Hfrom='-';
					
				}
				if($udxarr[$i][0]!='-')
				{
$sql="CALL SAV_CONTR_ITMS ('".$row[0]."','".$ItmCode."','".$NofDays."','".$DlyChrg."','".$Hfrom."','".$Hto."','".$Depst."','".$ItmTot."','".$ItmQty."','".$MnlyChrg."','".$Basis."','".$ItmType."')";
					mysqli_query($con,$sql);
				}
				//============================================
		   } 
		   //============================================

		   ContrCreatedSMS($row[0],$con);
		   echo $row[0];
} 



?>