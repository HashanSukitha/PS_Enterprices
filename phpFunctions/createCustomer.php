<?php
include('config.php');
//include('../SMS/customerCreated_SMS.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
//include($root.'/SMS/customerCreated_SMS.php');

$clTitle=$_POST['clTitle'];
$name=$_POST['name'];
$clNIC=$_POST['clNIC'];
$clCurrAdd=$_POST['clCurrAdd'];
$clPerAdd=$_POST['clPerAdd'];
$clWrkAdd=$_POST['clWrkAdd'];
$clCurTel=$_POST['clCurTel'];
$clPerTel=$_POST['clPerTel'];
$clWrkTel=$_POST['clWrkTel'];
$clEmail=$_POST['clEmail'];
//=======================================
$guTitle=$_POST['guTitle'];
$guName=$_POST['guName'];
$guCurAdd=$_POST['guCurAdd'];
$guPerAdd=$_POST['guPerAdd'];
$guCurTel=$_POST['guCurTel'];
$guPerTel=$_POST['guPerTel'];
$guWrkTel=$_POST['guWrkTel'];
$guEmail=$_POST['guEmail'];
$guNIC=$_POST['guNIC'];

$sql="CALL INS_CUSTOMER('".$clTitle."','".$name."','".$clCurrAdd."','".$clPerAdd."','".$clWrkAdd."','".$clCurTel."','".$clPerTel."','".$clWrkTel."','".$clNIC."','".$clEmail."','1',
@CL_CODE)";
//'".$guTitle."','".$guName."','".$guCurAdd."','".$guPerAdd."','".$guCurTel."','".$guPerTel."','".$guWrkTel."','".$guNIC."','".$guEmail."',
 mysqli_query($con,$sql);
$res=mysqli_query($con, "SELECT @CL_CODE");


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
		  
	$sql_1="CALL INS_GUARANTOR('".$row[0]."','".$guTitle."','".$guName."','".$guCurAdd."','".$guPerAdd."','".$guCurTel."','".$guPerTel."','".$guWrkTel."','".$guNIC."','".$guEmail."')";
	

	if(substr($clCurTel,0,2)=='07')
	{
		//CustomerCreatedSMS($clCurTel);
	}
	elseif(substr($clPerTel,0,2)=='07')
	{
		//CustomerCreatedSMS($clPerTel);
	}
	elseif(substr($clWrkTel,0,2)=='07')
	{
		//CustomerCreatedSMS($clWrkTel);
	}

	
	 mysqli_query($con,$sql_1);
     //$res=mysqli_query($con, "SELECT @GU_CODE");
	
} 
?>